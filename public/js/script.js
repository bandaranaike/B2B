function getArticlesData(url, container, id) {
    var c = $(container);
    $.ajax(url, {
        method: 'get',
        dataType: 'json',
        data: {},
        error: function (e) {
            console.log(e);
            c.html(e.responseJSON.m).addClass('text-danger');
        },
        success: function (r) {
            if (id) html = getHtml(r);
            else html = getListHtml(r);
            c.html(html)
        }
    });

    function getListHtml(r) {
        var html = '';
        $.each(r, function (ind, item) {
            html += '<div class="article-tile">';
            html += '<h3 class="title">' + item.title + '</h3>';
            html += '<p class="content">' + item.summary + '</p>';
            html += '<div class="author">' + item.author + '</div>';
            html += '<div class="date">' + item.createdAt + '</div>';
            html += '<a class="link" href="' + item.url + '">More..</a>';
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
        html += '<a class="link" href="' + i.url + '">More..</a>';
        html += '</div>';
        return html;
    }
}

