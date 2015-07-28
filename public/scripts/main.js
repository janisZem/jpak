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
                            + '     <h1>' + $('.new-paragraph-input').val() + '</h1>'
                            + '     <p>' + $('.new-paragraph-textarea').val() + '</p>'
                            + ' </div>';
                    $('.paragraph').last().after(elem);
                    $('.new-form').remove();
                    $('#new_paragraph').show();
                }
            }, "json");
        },
        edit: function (elem) { /* creates edit inputs */
            $('.paragraph').children('h1,p').off('mouseover');
            $(elem).text("Saglabāt");
            var $elem = $(elem).parent('div');
            var $h1 = $($elem.children('h1'));
            $h1.hide();
            $elem.children().first().before('<input type="text" value="' + $h1.text() + '">');
            $(elem).attr("onclick", "PAGE.PARGRAPH.save(this)");
        },
        save: function (elem) { /* update pragagraph */
            $(elem).text("Labot");
            var $elem = $(elem).parent('div');
            var $h1 = $($elem.children('h1'));
            $h1.text($elem.children('input').val());
            $h1.show();
            var p = $elem.children('p').text();
            var dataString = 'title=' + $elem.children('input').val()
                    + '&content='
                    + p
                    + '&_token='
                    + PAGE.token
                    + '&id='
                    + $elem.attr('id');
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "save_paragraph",
                data: dataString,
                success: function (data) {
                    //console.log(data);
                }
            }, "json");
            $elem.children('input').remove();
            $(elem).attr("onclick", "PAGE.PARGRAPH.edit(this)");
            $('.paragraph').children('h1,p').mouseover(function (e) {
                PAGE.PARGRAPH.showEdit(e);
            });
        },
        showEdit: function (e) { /* shows edit button */
            $('.edit-button').remove();
            var $elem = $(e.target);
            $elem.before('<div class="edit-button" onclick="PAGE.PARGRAPH.edit(this)">Labot</div>');
            if ($elem.prop('tagName') === 'h1') {
                //draw h1 edit
            } else if ($elem.prop('tagName') === 'p') {
                //draw p edit button 
            }
        }
    }
};
PAGE.init();
