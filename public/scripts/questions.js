var QUESTIONS = {
    init: function () {
        $('.question-title').on('click', function () {
            QUESTIONS.TITLE.edit();
        });
        $('.question-content').on('click', function () {
            QUESTIONS.CONTENT.edit();
        });
        $('.answer-content').on('click', function () {
            QUESTIONS.ANSWERS.edit(this);
        });
        $('.answer').children('.answer-content').mouseover(function (e) {
            QUESTIONS.ANSWERS.showDelete(e.target);
        });
        $("#add_tags_input").keyup(function () {
            $('.autocomplite-list').remove();
            if ($(this).val() < 1) {
                return;
            }
            $.ajax({
                type: "POST",
                url: "../../questions/tags",
                data: 'name=' + $(this).val() + '&_token=' + PAGE.token,
                success: function (data) {
                    $('#question_tags_div').append(data);
                }
            });
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
                    + '               <li><a class="h1-edit" onclick="QUESTIONS.TITLE.store()">Salgabāt</a></li>'
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
    },
    QUESTION: {
        setStatus: function (status, id) {
            QUESTIONS.QUESTION.update(status, 'status', id);
        },
        setState: function (state) {
            QUESTIONS.QUESTION.update(state, 'state');
        },
        update: function (status, type, id) {
            var url = 'question/update';
            if (!id) {
                id = $('.question-id').text();
                url = '../../question/update';
            }
            var ds = type + '=' + status
                    + '&_token='
                    + PAGE.token
                    + '&id='
                    + id;
            $.ajax({
                type: "POST",
                url: url,
                data: ds,
                success: function (r) {
                    if (type === "state") {
                        var $state = $('.state_' + id);
                        $state.text(r.value);
                        if (status === '0002') {
                            $state.removeClass('btn-warning');
                            $state.addClass('btn-success');
                        } else if (status === '0001') {
                            $state.addClass('btn-warning');
                            $state.removeClass('btn-success');
                        }
                    } else if (type === "status") {
                        var $status = $('.status_' + id);
                        if (status === '0002') {
                            $status.removeClass('btn-warning');
                            $status.addClass('btn-success');
                            $status.text("Redzams");
                        } else if (status === '0001') {
                            $status.addClass('btn-warning');
                            $status.removeClass('btn-success');
                            $status.text("Neredzams");
                        }
                    }
                }
            }, "json");
        }
    },
    ANSWERS: {
        edit: function (elem) {
            var $elem = $(elem);
            $elem.parent('.answer').append(QUESTIONS.ANSWERS.drawEdit($elem));
            $elem.hide();
            $elem.siblings('.author').hide();
        },
        drawEdit: function ($elem) {
            return '<textarea style="height:300px"'//fix syle attr
                    + 'id="answer_edit_content" '
                    + 'class="form-control">' + $elem.text() + '</textarea><br>'
                    + '<input id="answer_edit_name" placeholder="Vārds" type="text" value="' + $elem.siblings('.author').children('.answer_name').text() + '" class="form-control"><br>'
                    + '<input id="answer_edit_surname" placeholder="Uzvārds" type="text" value="' + $elem.siblings('.author').children('.answer_surname').text() + '" class="form-control"><br>'
                    + '<input type="hidden" value="' + $('.question-id').text() + '" id="question_id">'
                    + '<div onclick="QUESTIONS.ANSWERS.store(' + $elem.siblings('.answer_id').text() + ')"'
                    + ' class="edit-question-submit btn btn-default">Saglabāt</div>';
        }, store: function (id) {
            var ds = 'answer=' + $('#answer_edit_content').val()
                    + '&name=' + $('#answer_edit_name').val()
                    + '&surname=' + $('#answer_edit_surname').val()
                    + '&_token=' + PAGE.token
                    + '&id=' + id
                    + '&question_id=' + $('#question_id').val();
            $.ajax({
                type: "POST",
                url: "../../answer/store",
                data: ds,
                success: function () {
                    var $answer = $('#answer_id_' + id);
                    $answer.siblings('.answer-content').show();
                    $answer.siblings('.answer-content').text($('#answer_edit_content').val());
                    $('#answer_edit_content').remove();
                    $answer.siblings('.author').show();
                    $answer.siblings('.author').children('.answer_name').show();
                    $answer.siblings('.author').children('.answer_name').html($('#answer_edit_name').val());
                    $('#answer_edit_name').remove();
                    $answer.siblings('.author').children('.answer_surname').show();
                    $answer.siblings('.author').children('.answer_surname').text($('#answer_edit_surname').val());
                    $('#answer_edit_surname').remove();
                }
            }, "json");
        },
        showDelete: function (elem) {
            $('.answer-delete').remove();
            $(elem).parent('.answer').append('<button type="button" class="btn dropdown-toggle btn-danger answer-delete"'
                    + '             onclick="QUESTIONS.ANSWERS.delete(' + elem.id + ')"'
                    + '             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dzēst'
                    + '     </button>');
        },
        delete: function (elem) {
            var id = $(elem).attr('id').split('_')[2];
            var dataString = 'id=' + id
                    + '&_token='
                    + PAGE.token;
            $.ajax({
                type: "POST",
                url: "../../answer/delete",
                data: dataString,
                success: function (data) {
                    if (data === "OK") {
                        $("#answer_" + id).remove();
                    }
                }
            }, "json");
        }
    },
    TAGS: {
        save: function () {
            var ds = 'name=' + $('#add_tags_input').val()
                    + '&_token=' + PAGE.token;
            console.log(ds);
            $.ajax({
                type: "POST",
                url: "../../questions/save_tag",
                data: ds,
                success: function (r) {
                    QUESTIONS.TAGS.saveRel($('.question-id').text(), r);
                }
            }, "json");
        },
        saveRel: function (qid, tid) {
            var ds = 'qid=' + qid
                    + '&tid=' + tid
                    + '&_token=' + PAGE.token;
            $.ajax({
                type: "POST",
                url: "../../questions/save_rel",
                data: ds,
                success: function () {
                    location.reload();
                }
            }, "json");
        },
        addRel: function (tag) {
            QUESTIONS.TAGS.saveRel($('.question-id').text(), tag);
        },
        deleteRel: function (tag) {
            var ds = 'qid=' + $('.question-id').text()
                    + '&tid=' + tag
                    + '&_token=' + PAGE.token;
            $.ajax({
                type: "POST",
                url: "../../questions/delete_rel",
                data: ds,
                success: function () {
                    location.reload();
                }
            }, "json");
        }
    }

};
QUESTIONS.init();