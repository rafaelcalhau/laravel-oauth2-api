class Uploader {

    constructor() {

        this.btn = $('#btnUpload'),
        this.dropArea = $('.drop-area')
        this.files = null,
        this.form = $('#uploadform'),
        this.input = $('#file');

        this.createFormData = this.createFormData.bind(this);
        this.listeners = this.listeners.bind(this);
        this.doUpload = this.doUpload.bind(this);
        this.getExtension = this.getExtension.bind(this);

    }

    listeners() {

        const $this = this;

        this.input.on('change', function(e) {
            const filename = $(this).val();

            if (filename !== "" && $this.getExtension(filename) === "xml") {
                
                $this.files = e.target.files;
                $this.btn.addClass('green');
            
            } else {
                alert('Please select a XML file.');
            }

        });

        this.dropArea.on('dragenter', function( e ) {
            e.preventDefault();
            $(this).css('background', '#BBD5B8');
        })

        this.dropArea.on('dragover', function( e ) {
            e.preventDefault();
            $(this).css('background', '#BBD5B8');
        })

        this.dropArea.on('dragout', function( e ) {
            e.preventDefault();
            $(this).css('background', '#f7f7f7');
        })

        this.dropArea.on('drop', function( e ) {
            e.preventDefault();
            $(this).css('background', '#f7f7f7');
            
            $this.files = e.originalEvent.dataTransfer.files;
            $this.btn.addClass('green');
        })

        this.form.on('submit', function(e) {
            e.preventDefault();

            const files = $this.files;

            if (files !== null && files.length > 0) {
                $this.createFormData(files);
            }
        })

    }

    createFormData(files) {
        const formData = new FormData();

        formData.append("file", files[0]);
        formData.append("_token", this.form.find('input[name="_token"]').val());

        this.doUpload(formData);
    }

    doUpload(data) {
        const $this = this;
        $this.btn.addClass('loading');

        $.ajax({
            url: "upload",
            type: "POST",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            fail: function() {

                alert("Sorry, something is wrong.");
                $this.btn.removeClass('loading green');
                $this.input.val('');

            },
            success: function(data){
                
                $this.btn.removeClass('loading green');
                $this.input.val('');

                if (data.success) {

                    alert(data.success);

                } else if (data.error) {
                    
                    alert(data.error);

                }

            }
        });
    }

    getExtension(filename) {
        if(typeof filename === "string" && filename !== "") {
            const obj = filename.split('.');
            if(obj.length > 1) {
                return obj.pop().toLocaleLowerCase();
            }
        }

        return false;
    }

}

export default Uploader;