var PAGE = {
    PARGRAPH: {
        editH1: function (elem) {
            $(elem).text("Saglabāt");
            var $elem = $(elem).parent('div');
            var $h1 = $($elem.children('h1'));
            $h1.hide();
            $elem.children().first().before('<input type="text" value="' + $h1.text() + '">');
            $(elem).attr("onclick", "PAGE.PARGRAPH.saveH1(this)");
        },
        saveH1: function (elem) {
            $(elem).text("Labot");
            var $elem = $(elem).parent('div');
            var $h1 = $($elem.children('h1'));
            $h1.text($elem.children('input').val());
            $elem.children('input').remove();
            $h1.show();
        }
    }
};
