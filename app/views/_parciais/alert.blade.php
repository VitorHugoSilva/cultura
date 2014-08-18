{{--
    mensagem   mensagem do alert
    class?     classe css do bootstrapp (danger, warning, success*)
--}}
<div class="alert-main alert alert-{{$class or 'success' }} fade in" role="alert">
     <i class="close fa fa-times" data-dismiss="alert" aria-hidden="true"></i><span class="sr-only">Close</span>
    {{$mensagem}}
</div>