var PAGE = {
    init: function () {
        $('.paragraph').children('h1,p').mouseover(function (e) {
            PAGE.PARGRAPH.showEdit(e);
        });

    },
    PARGRAPH: {
        edit: function (elem) {
            $(elem).text("Saglabāt");
            var $elem = $(elem).parent('div');
            var $h1 = $($elem.children('h1'));
            $h1.hide();
            $elem.children().first().before('<input type="text" value="' + $h1.text() + '">');
            $(elem).attr("onclick", "PAGE.PARGRAPH.save(this)");
        },
        save: function (elem) {
            $(elem).text("Labot");
            var $elem = $(elem).parent('div');
            var $h1 = $($elem.children('h1'));
            $h1.text($elem.children('input').val());

            $h1.show();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var p = $elem.children('p').text();
            var dataString = 'title=' + $elem.children('input').val()
                    + '&content='
                    + p
                    + '&_token='
                    + csrf_token
                    + '&id='
                    + $elem.attr('id');
            $.ajax({
                type: "POST",
                url: "save_paragraph",
                data: dataString,
                success: function (data) {
                    console.log(data);
                }
            }, "json");
            $elem.children('input').remove();
            $(elem).attr("onclick", "PAGE.PARGRAPH.edit(this)");
        },
        showEdit: function (e) {
            $('.edit-button').remove();
            var $elem = $(e.target);
            $elem.before('<div class="edit-button" onclick="PAGE.PARGRAPH.edit(this)">Labot</div>');
            if ($elem.prop('tagName') === 'h1') {
                console.log('h1');
            } else if ($elem.prop('tagName') === 'p') {
                console.log('p');
            }
        }
    }
};
PAGE.init();
