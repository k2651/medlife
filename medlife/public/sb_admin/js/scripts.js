$(document).ready(function () {

    $(".lang_btn").click(function () {
        if ($(this).data('toggle') == 0) {
            console.log('show');
            $(".lang_input").removeClass('d-none');
            $(this).data('toggle', 1);
        } else {
            console.log('hide');
            $(".lang_input").addClass('d-none');
            $(this).data('toggle', 0);
        }
    });

    $('#add-lang-btn').click(function () {
        var url = $(this).data('url');
        var lang = $('#add-lang').val();
        var btn = this;

        if (lang == "") {
            $(".alert").remove();
            $(this).parent().parent().append("<h6 class='alert alert-danger text-weight-bold'>Completeaza!</h6>")
        } else {
            axios.post(url, {
                    lang: lang
                })
                .then(function (response) {
                    if (response.data)
                        location.reload();
                    else {
                        $(".alert").remove();
                        $(btn).parent().parent().append("<h6 class='alert alert-danger m-auto text-weight-bold'> Limba deja exista! </h6>")
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });

    $(".delete-lang-btn").click(function () {
        let url = $(this).data('url');
        axios.delete(url)
            .then(function (response) {
                console.log(response.data)
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
    });
    $("input.main-page-checkbox").click(function () {
        let select_lang = $('select.add-main-page');
        let select_index = $('select.add-page-index');
        let label = $('label.page-ord-label');
        if ($("input.main-page-checkbox").is(':checked')) {
            select_lang.removeClass('d-none');
            select_index.addClass('d-none');
            label.addClass('d-none');
        } else {
            select_lang.addClass('d-none');
            select_index.removeClass('d-none');
            label.removeClass('d-none');
        }

    });
    $("#add-page-form").submit(function (e) {
        e.preventDefault();
        let dataForm = new FormData(this);
        let url = $(this).data("url");
        let route = $("#route").val();
        let title = $("#title").val();
        let description = $("#description").val();
        let lang = $("select.add-page-lang").children("option:selected").val();
        let index = $("select.add-page-index").children("option:selected").val();
        console.log(index);

        if ($("input.main-page-checkbox").is(':checked')) {
            let page = $("select.add-main-page").children("option:selected").val();
            dataForm.append('page', page); // if it's checked => read the main page from select
        } else // in other case the page is primary and have index on the navbar 
            dataForm.append('index', index);
        dataForm.append('title', title);
        dataForm.append('description', description);
        dataForm.append('lang', lang);
        dataForm.append('route', route);
        if (title && description) {
            $.ajax({
                url: url,
                method: "POST",
                data: dataForm,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data == 0) {
                        $(".alert").remove();
                        $(".modal-body").append("<h6 class='alert alert-danger text-weight-bold mt-4'> Pagina cu acest titlu deja exista </h6>")
                    } else if (data == -1) {
                        $(".alert").remove();
                        $(".modal-body").append("<h6 class='alert alert-danger text-weight-bold mt-4'> Eroare la incarcarea imaginii <br> Formatele admisibile sunt jpeg,png,jpg </h6>")
                    } else {
                        location.reload();
                    }
                }
            });
        } else {
            $(".alert").remove();
            $(".modal-body").append("<h6 class='alert alert-danger text-weight-bold mt-4'>Completeaza toate cimpurile </h6>")
        }
    });

    $('.add-card-btn').click(function () {
        let url = $(this).data("url");
        let title = $("#title").val();
        let description = $("#description").val();
        let lang = $("select.add-card-lang").children("option:selected").val();
        let page_id = $(this).data('id');

        if (title && description && lang) {
            axios.post(url, {
                    title: title,
                    description: description,
                    lang: lang,
                    page_id: page_id
                })
                .then(function (response) {
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error.message);
                });
        } else {
            $(".alert").remove();
            $(".modal-body").append("<h6 class='alert alert-danger text-weight-bold mt-4'>Completeaza toate cimpurile </h6>")
        }

    });

    $(".delete-page-btn").click(function () {
        let url = $(this).data('url');
        axios.delete(url)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
    });

    $(".delete-subpage-btn").click(function () {
        let url = $(this).data('url');
        axios.delete(url)
            .then(function (response) {
                // location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
    });

    $(".edit-page-btn").click(function () {
        let routeName = $(this).data('route');
        $("input#routeEdit").attr('value', routeName);
    });

    $(".delete-card-btn").click(function () {
        let url = $(this).data('url');

        axios.delete(url)
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
    });
    $(".edit-page-form").submit(function (e) {
        e.preventDefault();
        let fdata = new FormData(this);
        let url = $(this).data("url");
        let id = $(this).data('id');
        let route = $("#route-edit-" + id).val();
        let index = $("select#add-page-index-" + id).children("option:selected").val();
        fdata.append('route', route);
        fdata.append('index', index);
        fdata.append('id', id);
        fdata.append('_token',$('meta[name="csrf-token"]').attr('content'));

        if (route != "") {
     
            $.ajax({
                url:url,
                method:"POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data:fdata,
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if(data == 1)
                         location.reload();
                }
            });
           
        }
    });
    $(".edit-subpage-form").submit(function (e) {
        e.preventDefault();
        let fdata = new FormData(this);
        let url = $(this).data("url");
        let id = $(this).data('id');
        let route = $("#route-edit-" + id).val();
        fdata.append('route', route);
        fdata.append('id', id);
        fdata.append('_token',$('meta[name="csrf-token"]').attr('content'));

        if (route != "") {
     
            $.ajax({
                url:url,
                method:"POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data:fdata,
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if(data == 1)
                         location.reload();
                }
            });
           
        }
    });
    $('.switch-text-lang').change(function() {
        // let val = $(".switch-text-lang option:selected").text();
        let langID = $("select.switch-text-lang").children("option:selected").val();
        axios.get('/text/{'+ page + '}/' +'langID')
            .then(function (response) {
                // handle success
                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .finally(function () {
                // always executed
            });
        
    });
    // $(document).on('click', '.add-text-btn', function(){ 
    //     let url = $(this).data('url');
    //     let description =  $('#editor').summernote('code');
    //     let langID = $("select.switch-text-lang").children("option:selected").val();
    //     let pageID = $(this).data('id');
    //     console.log(description)
    //     // axios.post(url, {
    //     //     description:description,
    //     //     language_id : langID,
    //     //     page_id : pageID

    //     // })
    //     // .then(function (response) {
    //     //         location.reload();
    //     // })
    //     // .catch(function (error) {
    //     //     console.log(error);
    //     // });
    // });

    $("input.nav-page-checkbox").click(function () {
        let page_id = $(this).data('id');
        let select_index = $('select.add-page-index');
        let label = $('label.page-ord-label');
        if ($("input.main-page-checkbox").is(':checked')) {
            select_lang.removeClass('d-none');
            select_index.addClass('d-none');
            label.addClass('d-none');
        } else {
            select_lang.addClass('d-none');
            select_index.removeClass('d-none');
            label.removeClass('d-none');
        }

    });

//     $('.btn-edit-text').click(function() {
       
//       let url = $(this).data('url');
//       let description =  $('.editor-textarea').val();
//  console.log(description)
//       console.log(url)
//     axios({
//         method: 'PUT',
//         url: url,
//         data: {
//         description : 'description'
//         }
//     });
//     console.log(description)
//     console.log('dhuwaihdiaw');
//     });
  
$('.edit-card-form').submit(function (e) {
    e.preventDefault()
    let url = $(this).data("url");
    let id = $(this).data('id');
    console.log(id);
    let title_edit = $("#title-" + id).val();
    let description_edit = $("#description-" + id).val();
    let lang = $("select.edit-card-lang-"+ id).children("option:selected").val();
    let page_id = $(this).data('id');
    console.log(url);
    console.log(title_edit);
    console.log(description_edit);
    console.log(lang);
    if (title && description && lang) {
        axios.put(url, {
                title: title_edit,
                description: description_edit,
                lang: lang,
                page_id: page_id
            })
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error.message);
            });
    } else {
        $(".alert").remove();
        $(".modal-body").append("<h6 class='alert alert-danger text-weight-bold mt-4'>Completeaza toate cimpurile </h6>")
    }

});
$('.nav-show-page-checkbox').click(function()
{

        let id = $(this).data('id');
        let url = $(this).data('url');
        let nav_active;
        if ($('#switch-' + id).is(':checked')) {
            nav_active = 1;
        } else {
            nav_active = 0;
        }
        axios.put(url, {
            'nav_active' : nav_active
          })
          .then(function (response) {
            if(response.data == -1)
            {
                $('#switch-' + id).prop('checked', false);
                alert("Maxim 7 elemente admisibile pe bara de navigare");
                
            }
          })
          .catch(function (error) {
            console.log(error);
          });

})
$('.drop-show-page-checkbox').click(function()
{

        let id = $(this).data('id');
        let url = $(this).data('url');
        let drop_active;
        if ($('#switch-' + id).is(':checked')) {
            drop_active = 1;
        } else {
            drop_active = 0;
        }
        axios.put(url, {
            'drop_active' : drop_active
          })
          .then(function (response) {
            console.log(response);       
          })
          .catch(function (error) {
            console.log(error);
          });

})
$('.welcome-show-page-checkbox').click(function()
{

        let id = $(this).data('id');
        let url = $(this).data('url');
        let welcome;
        if ($('#switch-welcome-' + id).is(':checked')) {
            welcome = 1;
        } else {
            welcome = 0;
        }
        axios.put(url, {
            'welcome' : welcome
          })
          .then(function (response) {
            if(response.data == -1)
            {
                $('#switch-welcome-' + id).prop('checked', false);
                alert("Maxim 3 elemente admisibile pe pagina de pornire");
                
            }
          })
          .catch(function (error) {
            console.log(error);
          });

})



});