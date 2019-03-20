<?php

namespace App\Http\Controllers;

use App\Order;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function upload(DB $db, Request $request)
    {
        if ($request->hasFile('file') and $request->file('file')->isValid()) {

            $file = $request->file('file');
            $ext = explode( ".", $file->getClientOriginalName());
            
            if (is_array( $ext ) and count( $ext ) > 0) {
                $ext = $ext[count( $ext ) - 1];
            } else {
                $ext = "";
            }

            if ($ext == "xml" and $file->getClientMimeType() == "text/xml") {
                
                $xml = new \SimpleXMLElement( $file->getPathName(), null, true );

                try {
                    $db::beginTransaction();

                    if ($xml->person) {
                        foreach ($xml as $node) {
                            
                            $person = new Person();
                            $person->saveRecord($node);
                            
                        }
                    } elseif($xml->shiporder) {
                        foreach ($xml as $node) {
                            
                            $order = new Order();
                            $order->saveOrder($node);
                            
                        }
                    }

                    $db::commit();
                } catch(\PDOException $e) {
                    $db::rollback();

                    $error = $e->getMessage();
                    $message = "";
                    
                    if (strpos( $error, "Integrity constraint violation" )) {
                        $message = "There is a integrity constraint violation. Please upload first the people xml file.";
                    } else {
                        $message = $e->getMessage();
                    }

                    return response()->json([
                        'error' => $message
                    ]);
                }

                // Delete the file
                unlink( $file->getPathName() );

                return response()->json([
                    'success' => "File uploaded successfully."
                ]);
                

            } else {

                return response()->json([
                    'error' => "Invalid file's extension."
                ]);

            }

        } else {

            return response()->json([
                'error' => 'Invalid data.'
            ]);

        }
    }
}
