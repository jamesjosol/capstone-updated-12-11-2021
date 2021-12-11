<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stat-overview-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users-personal-info-style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Test</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="profile-images-card">

                    <div class="profile-images">
                        <img src="../img/pp.png" id="sidebar-profile-pic">
                    </div>
        
                    <div class="custom-file">
                        <label for="fileupload">
                            <i class='bx bx-image-add ml-3' style="font-size: 25px;"></i>
                            <span id="change-profile-pic" class="links-name text-white">Upload Photo</span>
                        </label>
                        {{-- <input type="file" id="fileupload"> --}}
                        <input type="file" id="image-select" accept="image/*">
                    </div>
                    <h4>{{ auth()->user()->firstName }}</h4>
        
                </div>
            </div>
        </div>
    </div>
    @include('component.crop_img')
    <script>
        $(document).ready(function(){
            $("#change-profile-pic").click(function(){
                $("#image-select").trigger('click');
            })

            $(".close-modal").click(()=>{
                $("#cropperModal").modal('hide')
            })

        })

        var $modal = $('#cropperModal');

        var image = document.getElementById('image');

        var cropper;


        $("body").on("change", "#image-select", function(e){

                var files = e.target.files;

                var done = function (url) {

                image.src = url;

                $modal.modal('show');

            };

            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                done(reader.result);
                };
                reader.readAsDataURL(file);
            }
            }
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
        });

        $("#crop").click(function(){

            canvas = cropper.getCroppedCanvas({
                width: 200,
                height: 200,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "/profile-pic/upload",
                        data: {'image': base64data},
                        success: function(data){
                            $modal.modal('hide');
                            $("#sidebar-profile-pic").attr('src', base64data);
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            });
        })
    </script>
</body>
</html>