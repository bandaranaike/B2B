function getArticlesData(url, container, id) {
    var c = $(container);
    $.ajax(url, {
        method: 'get',
        dataType: 'json',
        data: {},
        error: function (e) {
            c.html(e.responseJSON).addClass('text-danger');
        },
        success: function (r) {
            if (id) html = getHtml(r);
            else html = getListHtml(r);
            c.html(html)
        },
        statusCode: {
            204: function () {
                c.html('No articles found!')
            }
        }
    });

    function getListHtml(r) {
        var html = '';
        $.each(r, function (ind, item) {
            html += '<div class="article-tile">';
            html += '<h3 class="title"><a class="link" href="' + item.url + '">' + item.title + '</a></h3>';
            html += '<div class="content">' + item.summary + '</div>';
            html += '<div class="author">' + item.author + '</div>';
            html += '<div class="date">' + item.createdAt + '</div>';
            html += '<a class="btn btn-link" href="' + item.url + '">More..</a>';
            html += '<a class="btn btn-link" href="/article/update/' + item.id + '">Edit</a>';
            html += '<a class="btn btn-link" data-id="' + item.id + '" href="#confirm" data-toggle="modal">Delete</a>';
            html += '</div>';
        });
        return html;
    }

    function getHtml(i) {
        var html = '<div class="article">';
        html += '<h1 class="title">' + i.title + '</h1>';
        html += '<p class="content">' + i.content + '</p>';
        html += '<div class="author">' + i.author + '</div>';
        html += '<div class="date">' + i.createdAt + '</div>';
        html += '</div>';
        return html;
    }
}

function deleteArticle(delete_url) {
    var i, id;
    $('#confirm').on('show.bs.modal', function (e) {
        i = $(e.relatedTarget);
        id = i.data('id');
        console.log(e.relatedTarget);
    });

    $('#delete').click(function () {
        $.ajax(delete_url, {
            method: 'delete',
            data: {id: id},
            dataType: 'json',
            statusCode: {
                200: function () {
                    $('#confirm').modal('hide');
                    i.parent().remove();
                },
                404: function (m) {
                    $('#confirm').modal('hide');
                    i.parent().append(m).addClass('text-danger');
                }
            }
        });
    });
}

