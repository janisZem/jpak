var PAGE = {
    init: function () {
        $('.paragraph').children('h1,p').mouseover(function (e) {
            PAGE.PARGRAPH.showEdit(e);
        });
        $('#new_paragraph').on('click', function () {
            PAGE.PARGRAPH.addNew();
        });
    },
    token: $('meta[name="csrf-token"]').attr('content'),
    PARGRAPH: {
        addNew: function () { /* creates paragraph inputs */
            var html = '<div class="new-form">'
                    + '     <input type="text" class="new-paragraph-input"><br>'
                    + '     <textarea class="new-paragraph-textarea"></textarea>'
                    + '     <div onclick="PAGE.PARGRAPH.store()" class="button new-paragraph-submit">Pievienot</div>'
                    + ' </div>';
            $('.paragraph').last().after(html);
            $('#new_paragraph').hide();
        },
        store: function () { /* saves new paragraph */
            if ($('.new-paragraph-input').val() === ""
                    || $('.new-paragraph-textarea').val() === "") {
                return; //show some error
            }
            var dataString = 'title=' + $('.new-paragraph-input').val()
                    + '&content='
                    + $('.new-paragraph-textarea').val()
                    + '&_token='
                    + PAGE.token;
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
                    $('.paragraph').last().after(elem);
                    $('.new-form').remove();
                    $('#new_paragraph').show();
                }
            }, "json");
        },
        edit: function (elem) { /* creates edit inputs */
            console.log("taisīšu inputus elem = ");
            console.log(elem);
            $('.paragraph').children('h1,p').off('mouseover');
            $(elem).text("Saglabāt");
            var $elem = $(elem).parent('div');
            if ($(elem).hasClass("h1-edit")) {
                var $h1 = $($elem.children('h1'));
                $h1.hide();
                $elem.children().first().before('<input id="edit_title_input" type="text" value="' + $h1.text() + '">');
            } else if ($(elem).hasClass('p-edit')) {
                var $p = $($elem.children('p'));
                console.log($p.text());
                $p.hide();
                $elem.children().first().after('<textarea id="edit_p_textarea">' + $p.text() + '</textarea>');
            }
            $(elem).attr("onclick", "PAGE.PARGRAPH.save(this)");
        },
        save: function (elem) { /* update pragagraph */

            console.log(elem);
            $(elem).text("Labot");
            var $elem = $(elem).parent('div');
            var $h1 = $($elem.children('h1'));
            var $p = $($elem.children('p'));
            var title = "";
            var p = "";

            if ($(elem).hasClass('h1-edit')) {

                title = $elem.children('input').val();
                p = $elem.children('p').text();
                $h1.text($elem.children('input').val());
                $h1.show();
                $('#edit_title_input').remove();
            } else if ($(elem).hasClass('p-edit')) {
                console.log('im here');
                title = $elem.children('h1').text();
                p = $elem.children('textarea').text();
                console.log(p);
                $p.text($elem.children('textarea').text());
                $p.show();
                $('#edit_p_textarea').remove();
            }


            if (p === "" || $elem.children('input').val() === "") {
                return; //display error
            }
            var dataString = 'title=' + title
                    + '&content='
                    + p
                    + '&_token='
                    + PAGE.token
                    + '&id='
                    + $elem.attr('id');
            //console.log(dataString);
            $.ajax({
                type: "POST",
                url: "save_paragraph",
                data: dataString,
                success: function (data) {
                    //console.log(data);
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
            console.log(id);
            var dataString = 'id=' + id
                    + '&_token='
                    + PAGE.token;
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
        }
    }
};
PAGE.init();
