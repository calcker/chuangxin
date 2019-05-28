@component('mail::message')

# 欢迎注册使用「创新之城」

点击下面按钮进行激活。

@component('mail::button', ['url' =>{{ config('app.url') . '/register/email/verify/' . $token  }}  ])

激活

@endcomponent

Thanks,<br>

{{ config('app.name') }}

@endcomponent
