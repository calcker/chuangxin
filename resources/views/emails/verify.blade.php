@component('mail::message')

亲爱的 {{ $name }}

# 欢迎注册「创新之城」

点击下面按钮完成账号激活。

@component('mail::button', ['url' => $url ])

激活

@endcomponent

Thanks,<br>

{{ config('app.name') }}

@endcomponent
