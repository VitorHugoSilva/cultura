 {{--
    mensagem? A mensagem que aparece na caixa de alerta
 --}}
 <div class="modal fade modal-confirm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">ATENÇÃO!</h4>
      </div>
      <div class="modal-body">
        <p class="modal-mensagem">{{ $mensagem or 'Deseja realmente prosseguir?' }} </p>
      </div>
      <div class="modal-footer">
        <a class="btn  btn-danger modal-confirm-link" >Sim</a>
        <button type="button" class="btn btn-default " data-dismiss="modal">Não</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('global-js')
$(".modal-confirm-action").click(function(e) {
    var link = $(this).attr('href'); 
    var msg  = $(this).data('mensagem');
    $(".modal-confirm-link").attr('href', link);
    $('.modal-confirm').find('p.modal-mensagem').text(msg);
    $('.modal-confirm').modal('show');
    e.preventDefault();
});
@stop