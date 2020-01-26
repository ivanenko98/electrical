$(function() {
    if($('.js-example-basic-single').length) {
        $('.js-example-basic-single').select2();
    }
    if($('.chartjs-render-monitor').length) {

        $.ajax({
            type: 'GET',
            url: '/admin/dashboard/getChart',
            processData: false,
            contentType: false,
            success: function(data) {
                renderChart(data.data, data.labels)
            }
        });
    }

    function renderChart(data, labels) {
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

        var salesChartData = {
            labels  : labels,
            datasets: [
                {
                    label               : 'Digital Goods',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : data
                },
                /*{
                  label               : 'Electronics',
                  backgroundColor     : 'rgba(210, 214, 222, 1)',
                  borderColor         : 'rgba(210, 214, 222, 1)',
                  pointRadius         : false,
                  pointColor          : 'rgba(210, 214, 222, 1)',
                  pointStrokeColor    : '#c1c7d1',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data                : [65, 59, 80, 81, 56, 55, 40]
                },*/
            ]
        }

        var salesChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines : {
                        display : false,
                    }
                }],
                yAxes: [{
                    gridLines : {
                        display : false,
                    }
                }]
            }
        }

        var salesChart = new Chart(salesChartCanvas, {
                type: 'line',
                data: salesChartData,
                options: salesChartOptions
            }
        )
    }

    $('.profile_edit_button').click(function(){
        $('.profile_edit_button').removeClass("active");
        $('.profile_save_button').addClass("active");

        $("input").prop('disabled', false);
        $("select").prop('disabled', false);

        return false;
    });

    $('.select_all_zones').click(function(){

      $(".checkbox_container input:checkbox").prop('checked', true);

      return false;
    });

    $('.deselect_all_zones').click(function(){

      $(".checkbox_container input:checkbox").prop('checked', false);

      return false;
    });

    $('.input_edit_button').click(function(){
      let targetInput = $(this).data( "form-control-target" );

      $(".form-control_" + targetInput).prop('disabled', function(i, v) { return !v; });
      $(".form-control_" + targetInput).focus();

      if($(this).text() === "Edit") {
        $(this).text("Save");
      } else {
        $(this).text("Edit");
      }

      return false;
  });

  $('input.timepicker').timepicker({});



    $('.edit_section').click(function(){

        var id = $(this).get(0).id;

        if($(this).text() === "Edit") {
            $(this).text("Save");
            $(".form-control_" + id).prop("disabled", false)
            $(".form-control_" + id).focus()
        } else {

            var _token = $("#form"+id).find("input[name='_token']").val();
            var _method = $("#form"+id).find("input[name='_method']").val();
            var title = $("#form"+id).find("input[name='title']").val();
            var url = $("#form"+id).attr('action');

            $.ajax({
                type:_method,
                url: url,
                dataType: 'json',
                data: {
                    _token:_token,
                    title:title,
                },
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        printSuccessMsg(data.success, id);
                    } else{
                        printErrorMsg(data.error, id);
                    }
                }
            });

            $(this).text("Edit");
            $(".form-control_" + id).prop("disabled", true)
        }
        function printSuccessMsg(msg, id) {
            $("."+"print-error-msg"+id).css('display','none');
        }

        function printErrorMsg (msg, id) {
            $("#"+id).text("Save");
            $(".form-control_" + id).prop("disabled", false)
            $(".form-control_" + id).focus()

            $("."+"print-error-msg"+id).find("ul").html('');
            $("."+"print-error-msg"+id).css('display','block');
            $.each( msg, function( key, value ) {
                $("."+"print-error-msg"+id).find("ul").append('<li>'+value+'</li>');
            });
        }

        return false;
    });

    $('.input_pdf').change(function(e){
        var fileName = e.target.files[0].name;
        $(this).next('.custom-file-label').html(fileName);
    });

    var product_images = [];
    var product_images_thumb = [];
    $('#upload_image').change(function(e){
        let data = new FormData;
        data.append('_token', $('.add_image').find("input[name='_token']").val());

        var TotalImages = $("input[id='upload_image']").prop('files').length;
        for (let i = 0; i < TotalImages; i++) {
            data.append('images[]', $("input[id='upload_image']").prop('files')[i]);
        }

        var url = $('.add_image').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.success) {
                    $('.images-upload').css('display','none');
                    showImages(data.success.uploads)
                    addImages(data.success.uploads)
                }
                else {
                    $('.images-upload').find("ul").html('');
                    $('.images-upload').css('display','block');
                    $(".modal-body").find("ul").append('<li>'+data[1]+'</li>');
                }
            }
        });
    });

    function showImages (images) {
        $.each(images, function(key, value ) {
            $('#upload_images').find("tbody").append('<tr>'+
                '<td><a href="'+value.url+'" class="book_cover_image" target="_blank">'+
                '<img src="'+value.url+'" alt="">'+
                '</a>'+
                '</td>'+
                '<td>'+value.url+'</td>'+
                '<td>'+value.size+' bytes</td>'+
                '<td class="text-right py-0 align-middle">\n' +
                '<div class="btn-group btn-group-sm">\n' +
                '<a href="'+value.url+'" class="btn btn-info" target="_blank"><i class="fas fa-eye"></i></a>\n' +
                '<a href="'+value.url+'" class="btn btn-danger delete-image"><i class="fas fa-trash"></i></a>\n' +
                '</div>\n' +
                '</td>'+
                '</tr>');
        });
    }

    function addImages (images) {
        $.each(images, function(key, value ) {
            product_images.push(value.url);
            product_images_thumb.push(value.thumb);
        });
    }

    $(document).on("click", ".delete-image", function (e) {
        e.preventDefault();

        var url = $(this).attr('href')
        if (url !== undefined) {
            $.post('/admin/image/delete', {
                image_link: url,
                _token: $('input[name="_token"]').val()
            })
        }
        product_images.remove(url)
        $(this).parents("tr").html('')

    });

    Array.prototype.remove = function(value) {
        var idx = this.indexOf(value);
        if (idx != -1) {
            return this.splice(idx, 1);
        }
        return false;
    }


    $('#save_product').click(function(e){
        e.preventDefault();
        $("#product-images").val(product_images);
        $("#product-images-thumb").val(product_images_thumb);
        $('#form-product').submit();
    })
});
