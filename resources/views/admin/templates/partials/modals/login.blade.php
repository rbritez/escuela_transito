<div class="modal fade" id="modal-login"><!-- cambiar el ID para que pueda ser llamado por el boton del  modal -->
    <div class="modal-dialog">
      <div class="modal-content"><!--header content -->
        <div class="modal-header"> <!--header modal -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Iniciar Sesion</h4>
        </div><!-- finish header modal -->
        <div class="modal-body">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">Email o Usuario</label>

                    <div class="col-md-6">
                        <input id="login" type="login" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus placeholder="Introduce tu Email o Nombre de Usuario">
                        @if ($errors->has('login'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('login') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <a class="btn btn-link" href="{{ route('password.request') }}">Olvidaste tu Contraseña?</a>
                    </div>
                </div>
        </div>
        <div class="modal-footer"><!-- modal footer -->
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info"><i class="fa fa-sign-in "></i>  Ingresar</button>
        </form>
        </div><!-- /.modal-footer -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
</section> {{-- SECTION WRAPPER    --}}
</section>{{-- SECTION MAIN-CONTAINER    --}}
</section>{{-- SECTION CONTAINER    --}}