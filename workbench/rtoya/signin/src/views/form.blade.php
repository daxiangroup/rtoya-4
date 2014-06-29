<div class="row">
    <div class="columns large-12">
        <h3>Sign in to rtoya NOW!</h3>
        <div class="panel">
            {{ Form::open(array('route' => 'signin.post')) }}
            <div class="row">
                <div class="columns large-12">
                    {{ Form::email('email', '', array('placeholder' => 'Email', 'class' => 'radius')) }}
                </div>
            </div>
            <div class="row">
                <div class="columns large-12">
                    {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'radius')) }}
                </div>
            </div>
            <div class="row">
                <div class="columns large-6">
                    {{ Form::button('Go', array('class' => 'button tiny radius')) }}
                </div>
                <div class="columns large-6">
                    {{ Form::checkbox('remember', '1', false, array('id' => 'frm-remember-me')) }}
                    {{ Form::label('frm-remember-me', 'Remember me')}} - {{ HTML::linkRoute('forgotpassword', 'Forgot Password') }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>