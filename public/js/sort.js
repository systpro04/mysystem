
    var sortAsc = true;
    $('.sort').click(function() {
        var sortBy = $(this).data('sortby');
        var rows = $('tbody > tr').get();

        rows.sort(function(a, b) {
            var keyA = $(a).children('td.' + sortBy).text().toUpperCase();
            var keyB = $(b).children('td.' + sortBy).text().toUpperCase();

            if (keyA < keyB) return -1;
            if (keyA > keyB) return 1;
            return 0;
        });

        if (!sortAsc) {
            rows.reverse();
        }

        $.each(rows, function(index, row) {
            $('tbody').append(row);
        });

        sortAsc = !sortAsc;
    });
