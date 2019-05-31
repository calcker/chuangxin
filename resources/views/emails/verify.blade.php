@component('mail::message')

亲爱的 {{ $name }}

# 欢迎注册「创新之城」

请点击下面按钮完成账号激活。

@component('mail::button', ['url' => $url ])

激活

@endcomponent

<hr>

如果此邮件不能正常显示, 可将以下内容直接复制到浏览器地址栏内

{{ $url }}

@endcomponent
