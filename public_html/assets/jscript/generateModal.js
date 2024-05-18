function createModal(id,label){
    var html = [
        '<div class="modal fade" id="'+ id +'+" tabindex="-1" role="dialog" aria-labelledby="'+label+'" aria-hidden="true">',
        '<div class="modal-dialog" role="document">',
        '<div class="modal-content">',
        '<div class="modal-header">',
        '<h5 class="modal-title" id="'+label +'">Modal title</h5>',
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">',
        '<span aria-hidden="true">&times;</span>',
        '</button>',
        '</div>',
        '<div class="modal-body">',
        '...',
        '</div>',
        '<div class="modal-footer">',
        '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>',
        '<button type="button" class="btn btn-primary">Save changes</button>',
        '</div>',
        '</div>',
        '</div>',
        '</div>'
    ];
    var modalHtml = html.join("\n");
    $("body").append(html);
    //here you force modal to be open

    $("#" + id).modal({"backdrop": "static"});
}