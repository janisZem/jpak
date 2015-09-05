var PAGE = {
    init: function () {
        $('.paragraph').children('h1,p').mouseover(function (e) {
            PAGE.PARGRAPH.showEdit(e);
        });
        $('#new_paragraph').on('click', function (e) {
            PAGE.PARGRAPH.addNew(e.target);
        });
    },
    token: $('meta[name="csrf-token"]').attr('content'),
    PARGRAPH: {
        addNew: function (elem) { /* creates paragraph inputs */
            var $elem = $(elem);
            var type = "'P'"; //index paragraph
            if ($elem.hasClass('legal')) {
                type = "'PL'"; //legal paragraph
            }else if($elem.hasClass('project')){
                type = "'PM'";//project managment paragraph
            }
            var html = '<div class="new-form">'
                    + '     <input type="text" class="new-paragraph-input form-control"><br>'
                    + '     <textarea id="edit_p_textarea" class="form-control new-paragraph-textarea"></textarea>'
                    + '     <div onclick="PAGE.PARGRAPH.store(' + type + ')" class="new-paragraph-submit btn btn-default">Pievienot</div>'
                    + ' </div>';
            $('#par_div').append(html);
            $('#new_paragraph').hide();
        },
        store: function (type) { /* saves new paragraph */
            if ($('.new-paragraph-input').val() === ""
                    || $('.new-paragraph-textarea').val() === "") {
                return; //show some error
            }
            var dataString = 'title=' + $('.new-paragraph-input').val()
                    + '&content='
                    + $('.new-paragraph-textarea').val()
                    + '&_token='
                    + PAGE.token
                    + '&t=' + type;
            $.ajax({
                type: "POST",
                url: "save_paragraph",
                data: dataString,
                success: function (id) {
                    var elem = '<br>'
                            + ' <div class = "paragraph" id="' + id + '">'
                            + '     <h1 onmouseover="PAGE.PARGRAPH.showEdit(event)">' + $('.new-paragraph-input').val() + '</h1>'
                            + '     <p onmouseover="PAGE.PARGRAPH.showEdit(event)">' + $('.new-paragraph-textarea').val() + '</p>'
                            + ' </div>';
                    $('#par_div').append(elem);
                    $('.new-form').remove();
                    $('#new_paragraph').show();
                }
            }, "json");
        },
        edit: function (elem) { /* creates edit inputs */

            $('.paragraph').children('h1,p').off('mouseover');
            var $elem = $(elem).parent('div');
            var id = $elem.attr('id');
            if ($(elem).hasClass("h1-edit")) {
                $(elem).hide();
                var $h1 = $($elem.children('h1'));
                $h1.hide();
                $elem.children().first().before(PAGE.PARGRAPH.drawH1Edit($h1.text(), id));
            } else if ($(elem).hasClass('p-edit')) {
                $(elem).text('Saglabāt');
                $(elem).attr("id", 'save_edit_' + id);
                var $p = $($elem.children('p'));
                $p.hide();
                $elem.children().first().after('<textarea id="edit_p_textarea">' + $p.text() + '</textarea>');
            }
            $(elem).attr("onclick", "PAGE.PARGRAPH.save(this)");
        },
        save: function (elem) { /* update pragagraph */
            var title = "", p = "";
            var id = elem.id.split('_')[2];
            var type = $('#type_' + id).text();
            var parent = $('#' + id);
            var $elem = parent;
            var $h1 = $($elem.children('h1'));
            var $p = $($elem.children('p'));
            if ($(elem).hasClass('h1-edit')) {
                title = $('#h1_edit_input').val().trim();
                p = $elem.children('p').text().trim();
                $h1.text(title);
                $h1.show();
                $('.h1-edit-row').remove();
            } else if ($(elem).hasClass('p-edit')) {
                $(elem).text("Labot");
                title = $elem.children('h1').text().trim();
                p = $elem.children('textarea').val().trim();
                $p.text(p);
                $p.show();
                $('#edit_p_textarea').remove();
            }

            if (p === "" || title === "") {
                return; //display some error
            }
            var dataString = 'title=' + title
                    + '&content='
                    + p
                    + '&_token='
                    + PAGE.token
                    + '&id='
                    + $elem.attr('id')
                    + '&t=' + type;
            //console.log(dataString);
            $.ajax({
                type: "POST",
                url: "save_paragraph",
                data: dataString,
                success: function (data) {
                }
            }, "json");
            $(elem).attr("onclick", "PAGE.PARGRAPH.edit(this)");
            $('.paragraph').children('h1,p').mouseover(function (e) {
                PAGE.PARGRAPH.showEdit(e);
            });
        },
        showEdit: function (e) { /* shows edit button */
            $('.edit-button').remove();
            var $elem = $(e.target);
            var elemType = "none";
            if ($elem.prop('tagName') === 'H1') {
                elemType = "h1-edit";
            } else if ($elem.prop('tagName') === 'P') {
                elemType = "p-edit";
            }
            var html = '<div class="edit-button ' + elemType + '" onclick="PAGE.PARGRAPH.edit(this)">Labot</div>'
                    + '<div class="edit-button ' + elemType + '" onclick="PAGE.PARGRAPH.delete(this)">Dzēst</div>';
            $elem.before(html);
        },
        delete: function (elem) {
            var id = $(elem).parent('div').attr('id');
            var dataString = 'id=' + id
                    + '&_token='
                    + PAGE.token;
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "delete_paragraph",
                data: dataString,
                success: function (data) {
                    if (data === "OK") {
                        $("#" + id).next('br').remove();
                        $("#" + id).remove();
                    }
                }
            }, "json");
        },
        drawH1Edit: function (text, id) {
            return  '<div class="row h1-edit-row">'
                    + '<div class="col-lg-6">'
                    + '   <div class="input-group">'
                    + '       <input id="h1_edit_input" type="text" value="' + text + '" class="form-control" aria-label="...">'
                    + '       <div class="input-group-btn">'
                    + '           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iespējas '
                    + '               <span class="caret"></span>'
                    + '           </button>'
                    + '           <ul class="dropdown-menu dropdown-menu-right">'
                    + '               <li><a id="save_edit_' + id + '"class="h1-edit" onclick="PAGE.PARGRAPH.save(this)">Salgabāt</a></li>'
                    + '               <li role="separator" class="divider"></li>'
                    + '               <li><a>Atcelt</a></li>'
                    + '           </ul>'
                    + '       </div>'
                    + ' </div>'
                    + ' </div>'
                    + '</div>';
        }
    },
    ROW: {
        edit: function (elem) {
            var id = elem.id.split('_')[3];
            var $parent = $('#edit_row_' + id);
            $parent.children('h4').hide();
            $parent.children('p').hide();
            $parent.children('a').hide();
            $parent.children('.fa').after(PAGE.ROW.drawEditFields($parent));
        },
        save: function (elem) {
            var title = $('#edit_row_title').val().trim();
            var p = $('#edit_row_text').val().trim();
            var id = $(elem).attr('id').split('_')[2];
            var dataString = 'title=' + title
                    + '&content='
                    + p
                    + '&_token='
                    + PAGE.token
                    + '&id=' + id
                    + '&t=R'
                    + '&urlText=' + $('#edit_row_labal').val()
                    + '&url=' + $('#edit_row_url').val();
            $.ajax({
                type: "POST",
                url: "save_paragraph",
                data: dataString,
                success: function (data) {
                    var $parent = $('#edit_row_' + id);
                    $parent.children('h4').show().text($('#edit_row_title').val());
                    $parent.children('p').show().text($('#edit_row_text').val());
                    $parent.children('a').show();
                    $parent.children('a').first().text($('#edit_row_labal').val());
                    $parent.children('a').first().attr('href', $('#edit_row_url').val());
                    $('#edit_row_inputs_' + id).remove();
                }
            }, "json");
        },
        drawEditFields: function ($parent) {
            return '<div id="edit_row_inputs_' + $parent.attr('id').split('_')[2] + '">'
                    + '<input value="' + $parent.children('h4').text() + '" type="text" id="edit_row_title" class="form-control" placeholder="Virsraksts"><br>'
                    + '<textarea id="edit_row_text" placeholder="Rinkopa" class="form-control">' + $parent.children('p').text() + '</textarea><br>'
                    + '<input value="' + $parent.children('a').first().text() + '" placeholder="URL virsraksts" type="text" id="edit_row_labal" class="form-control"><br>'
                    + '<input placeholder="URL" type="text" value="' + $parent.children('a').first().attr('href') + '" id="edit_row_url" class="form-control" a><br>'
                    + '<div onclick="PAGE.ROW.save(' + $parent.attr('id') + ')" class="new-paragraph-submit btn btn-default">Saglabāt</div>'
                    + '</div>';
        }

    }
};
PAGE.init();
