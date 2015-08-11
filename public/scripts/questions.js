var QUESTIONS = {
    init: function () {
        $('.question-title').on('click', function () {
            QUESTIONS.TITLE.edit();
        });
        $('.question-content').on('click', function () {
            QUESTIONS.CONTENT.edit();
        });
    },
    TITLE: {
        edit: function () {
            var $elem = $('.question-title');
            $elem.hide();
            $('.question-title-div').children().first().before(QUESTIONS.TITLE.drawTitleEdit($elem.text()));
        },
        drawTitleEdit: function (val) {
            return  '<div class="row h1-edit-row">'
                    + '<div class="col-lg-6">'
                    + '   <div class="input-group">'
                    + '       <input id="question_title_edit" type="text" value="' + val + '" class="form-control" aria-label="...">'
                    + '       <div class="input-group-btn">'
                    + '           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iespējas '
                    + '               <span class="caret"></span>'
                    + '           </button>'
                    + '           <ul class="dropdown-menu dropdown-menu-right">'
                    + '               <li><a "class="h1-edit" onclick="QUESTIONS.TITLE.store()">Salgabāt</a></li>'
                    + '               <li role="separator" class="divider"></li>'
                    + '               <li><a>Atcelt</a></li>'
                    + '           </ul>'
                    + '       </div>'
                    + ' </div>'
                    + ' </div>'
                    + '</div>';
        },
        store: function () {
            var ds = 'title=' + $('#question_title_edit').val()
                    + '&_token='
                    + PAGE.token
                    + '&id='
                    + $('.question-id').text();
            $.ajax({
                type: "POST",
                url: "../../question/update",
                data: ds,
                success: function (r) {
                    var $title = $('.question-title');
                    $title.text($('#question_title_edit').val());
                    $('.h1-edit-row').remove();
                    $title.show();
                }
            }, "json");

        }
    },
    CONTENT: {
        edit: function () {
            $('.question-title-div').append(QUESTIONS.CONTENT.drawContentEdit());
            $('.question-content').hide();

        },
        drawContentEdit: function () {
            return '<textarea style="height:300px"'//fix syle attr
                    + 'id="edit_question" '
                    + 'class="form-control">' + $('.question-content').text() + '</textarea><br>'
                    + '<div onclick="QUESTIONS.CONTENT.store()"'
                    + ' class="edit-question-submit btn btn-default">Saglabāt</div>';
        },
        store: function () {
            var ds = 'question=' + $('#edit_question').val()
                    + '&_token='
                    + PAGE.token
                    + '&id='
                    + $('.question-id').text();
            $.ajax({
                type: "POST",
                url: "../../question/update",
                data: ds,
                success: function (r) {
                    var $content = $('.question-content');
                    $content.text($('#edit_question').val());
                    $('#edit_question').remove();
                    $('.edit-question-submit').remove();
                    $content.show();
                }
            }, "json");
        }
    }

};
QUESTIONS.init();