@props(['icon' => 'twitter', 'instagram', 'facebook', 'google'])

@if($icon === 'twitter' ?? false)

    <span class="iconify" data-icon="entypo-social:twitter" style="color: white;" data-width="35.01" data-height="27.69"></span>

@elseif($icon === 'instagram' ?? false)

    <span class="iconify" data-icon="ant-design:instagram-filled" style="color: white;" data-width="30" data-height="30"></span>

@elseif($icon === 'facebook' ?? false)

    <span class="iconify" data-icon="brandico:facebook-rect" style="color: white;" data-width="22.5" data-height="21.5"></span>

@elseif($icon === 'google' ?? false)

    <span class="iconify e" data-icon="logos:google-icon" data-width="22.05" data-height="22.12"></span>

@endif
