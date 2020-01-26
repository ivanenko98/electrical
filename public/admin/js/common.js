$(function () {
    if ($("#example1").length) {
        $("#example1").DataTable();
    }

    if ($("#example2").length) {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "language": {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                },
                "select": {
                    "rows": {
                        "_": "Выбрано записей: %d",
                        "0": "Кликните по записи для выбора",
                        "1": "Выбрана одна запись"
                    }
                }
            }
        });
    }

    // Summernote
    if ($('.textarea').length) {
        $('.textarea').summernote();
    }

    var iconPickerOpt = {cols: 5,  footer: false};
	var options = {
		hintCss: {'border': '1px dashed #13981D'},
		placeholderCss: {'background-color': 'gray'},
		ignoreClass: 'btn',
		opener: {
			active: true,
			as: 'html',
			close: '<i class="fa fa-minus"></i>',
			open: '<i class="fa fa-plus"></i>',
			openerCss: {'margin-right': '10px'},
			openerClass: 'btn btn-success btn-xs'
		}
	};
    menuEditor('myList', {listOptions: options, iconPicker: iconPickerOpt, labelEdit: 'Edit', labelRemove: 'X'});


    $(".btn-presentations-limit").on("click", function(){
        const input = $(this).closest("tr").find(".form-control");
        if(input.is(":disabled")){
            input.prop("disabled", false);
            $(this).removeClass("btn-info").addClass("btn-success").text("Save");
        }
        else{
            input.prop("disabled", true);
            $(this).addClass("btn-info").removeClass("btn-success").text("Edit");
        }

    });

    $('select[name=zone_id]').change(function () {
        $('#available_times').submit();
    });

});
