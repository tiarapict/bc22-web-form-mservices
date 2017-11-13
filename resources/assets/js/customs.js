function cloneGoods(a) {
    var _obj = $(a);
    var _tmpCardParentId = _obj.parent().parent().prev().children().first();
    var _tmpCardClone = $(_tmpCardParentId).clone();
    var _tmpCardId = $(_tmpCardClone).attr("id");
    var _mathRand = Math.random();
    var _tmpCardCloneInsert = _tmpCardClone.html().replace(_tmpCardId, _mathRand);
    _tmpCardCloneInsert = _tmpCardCloneInsert.replace('zmdi-dot-circle', 'zmdi-minus-circle-outline');
    _tmpCardCloneInsert = _tmpCardCloneInsert.replace('default-row', 'minus-row');
    $(_tmpCardCloneInsert).insertAfter($('#' + _tmpCardId).last());
    $('.minus-row').click(function() {
        var _parentRow = $(this).parent().parent().parent().parent();
        $(_parentRow).remove();
        return false;
    });
}

function post(b, c) {
    var $this = $(c);
    var $isnull = 0;
    var $msg = "";
    $.each($("input:visible, input:hidden, select:visible, textarea:visible"), function() {
        if ($(this).attr('wajib')) {
            if ($(this).attr('wajib') == 'true' && ($(this).val() == "" || $(this).val() == null)) {
                $isnull++;
            }
        }
    });
    if ($isnull > 0) {
        alertify.alert("Sorry, there are several columns to be filled / selected most. \nPlease check your entries in the column marked *)");
        return false;
    } else {
        alertify.okBtn("Yes").cancelBtn("No").confirm('Are you sure fill in the data is correct ?', function(ev) {
                $.ajax({
                    type: "POST",
                    url: $(b).attr('action'),
                    data: $(b).serializeArray(),
                    headers: {
                        dataType: "json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $($this).prop('disabled', true);
                    },
                    complete: function() {
                        $($this).removeAttr('disabled');
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status == 400) {
                            var msgResponse = '';
                            for (var msg in data.error) {
                                msgResponse += data.error[msg][0];
                                msgResponse += ' \n ';
                            }
                            swal("Oops...", msgResponse, "error");
                        } else if (data.status == 200) {
                            swal({ title: "Custom Declaration", text: data.message, type: "success", timer: 2000, showConfirmButton: false });
                            if (data.redirect.statement == true) {
                                setTimeout(function() {
                                    location.href = data.redirect.url;
                                }, 2000);
                            } else {
                                setTimeout(function() {
                                    location.reload(true);
                                }, 2000);
                            }
                        }
                    },
                    error: function(data, status, e) {
                        alertify.alert(data);
                    }
                });
            },
            function(ev) {
                ev.preventDefault();
                return false;
            });
    }
    return false;
}