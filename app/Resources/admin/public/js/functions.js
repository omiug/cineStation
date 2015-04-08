var adminCine = {
    tree: {
        loadNodeSelector: function(tree_url, idForm, formVal) {
            $('#' + idForm).on('loaded.jstree', function() {
                $('#' + idForm).jstree('open_all');
                if (formVal) {
                    $('#' + formVal + ' > a ').addClass('jstree-clicked');
                }
            })
            .jstree({
                "core": {
                    "check_callback": true,
                    "themes": {"stripes": true},
                    "data": function(obj, callback) {
                        $.ajax({
                            url: tree_url
                        }).done(function(data) {
                            callback.call(this, jQuery.parseJSON(data.replace(/__children/g, 'children').replace(/code/g, 'text')));
                        });
                    }
                }
            });

            $('#' + idForm).on('click', 'a', function() {
                $("#field_" + idForm).val($(this).parent().attr('id'));
            });
            $('body').on('click', '#reset_selection_' + idForm, function() {
                $("#field_" + idForm).val('');
                $('#' + idForm + ' a ').removeClass('jstree-clicked');
            });
        }
    },
    tools: {
        getFunctionWithString: function(string) {
            var fn = window[string];
            if (typeof fn === 'function') {
                return fn();
            }
            return false;
        }
    }
}