<?php
/*
    $data = $menuel['elements']
*/

if(!function_exists('renderDropdown')){
    function renderDropdown($data){
        if(array_key_exists('slug', $data) && $data['slug'] === 'dropdown'){
            echo '<li class="c-sidebar-nav-dropdown">';
            echo '<a class="c-sidebar-nav-dropdown-toggle" href="#">';
            if($data['hasIcon'] === true && $data['iconType'] === 'coreui'){
                echo '<i class="' . $data['icon'] . ' c-sidebar-nav-icon"></i>';    
            }
            echo $data['name'] . '</a>';
            echo '<ul class="c-sidebar-nav-dropdown-items">';
            renderDropdown( $data['elements'] );
            echo '</ul></li>';
        }else{
            for($i = 0; $i < count($data); $i++){
                if( $data[$i]['slug'] === 'link' ){
                    echo '<li class="c-sidebar-nav-item">';
                    echo '<a class="c-sidebar-nav-link" href="' . url($data[$i]['href']) . '">';
                    echo '<span class="c-sidebar-nav-icon"></span>' . $data[$i]['name'] . '</a></li>';
                }elseif( $data[$i]['slug'] === 'dropdown' ){
                    renderDropdown( $data[$i] );
                }
            }
        }
    }
}
?>


        <div class="c-sidebar-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="122" height="28" viewBox="0 0 122 28"><g><g><g><path fill="#fff" d="M73.037 27.153c-7.421-1.812-11.968-9.296-10.157-16.717C64.691 3.016 72.175-1.532 79.596.28c7.42 1.811 11.968 9.295 10.157 16.716-1.812 7.42-9.296 11.968-16.716 10.157z"></path></g><g><path fill="#fff" d="M21.343 18.55c-.067.364-.2.79-.4 1.28s-.542.92-1.024 1.29c-.483.372-1.058.632-1.726.78-.608.163-1.395.245-2.359.245H6.886v-2.872H15.3c.83 0 1.472-.122 1.925-.367.453-.245.68-.708.68-1.391v-.334c-.045-.46-.164-.794-.358-1.002a1.95 1.95 0 0 0-.858-.445 5.15 5.15 0 0 0-1.149-.111h-3.97c-1.709 0-3.029-.356-3.958-1.069-.929-.712-1.393-1.906-1.393-3.583 0-.846.14-1.603.422-2.27.282-.668.668-1.184 1.158-1.547a4.525 4.525 0 0 1 1.692-.768c.578-.163 1.357-.245 2.337-.245h8.836v2.871h-8.302c-1.751 0-2.627.698-2.627 2.093 0 .593.2 1.023.601 1.29.386.298.898.446 1.536.446h4.43c.86 0 1.624.06 2.292.178.608.133 1.235.493 1.881 1.08.646.586.968 1.672.968 3.26 0 .43-.033.827-.1 1.19zM13.831-.115C6.192-.115 0 6.078 0 13.716c0 7.639 6.192 13.831 13.831 13.831 7.639 0 13.83-6.192 13.83-13.83 0-7.64-6.191-13.832-13.83-13.832z"></path></g><g><g><path fill="#fff" d="M52.723 13.72c-.29.73-.705 1.3-1.247 1.71-.542.409-1.024.67-1.446.781-.424.112-.761.194-1.013.246a3.721 3.721 0 0 1-.757.078h-5.965v5.61h-3.361V6.14h7.3c1.113 0 2.033.049 2.76.145a4.741 4.741 0 0 1 1.937.682c.742.417 1.298 1.028 1.67 1.833.37.805.556 1.67.556 2.593 0 .82-.145 1.595-.434 2.325zM45.034-.116c-7.638 0-13.83 6.193-13.83 13.831 0 7.639 6.192 13.831 13.83 13.831 7.639 0 13.831-6.192 13.831-13.83 0-7.64-6.192-13.832-13.83-13.832z"></path></g><g><path fill="#fff" d="M48.56 9.49c-.571-.318-1.361-.478-2.37-.478h-3.895v4.697h4.073c2.033 0 3.05-.78 3.05-2.337 0-.935-.287-1.562-.858-1.881z"></path></g></g><g><path fill="#fff" d="M114.407 8.968h-5.164v13.177h-3.494V8.968h-5.12V6.185h13.778zM107.518.312c-7.638 0-13.83 6.192-13.83 13.83 0 7.64 6.192 13.832 13.83 13.832 7.639 0 13.831-6.193 13.831-13.831 0-7.639-6.192-13.831-13.83-13.831z"></path></g></g></g></svg>
        </div>
        <ul class="c-sidebar-nav">
        @if(isset($appMenus['sidebar']))
            @foreach($appMenus['sidebar'] as $menuel)
                @if($menuel['slug'] === 'link')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ url($menuel['href']) }}">
                        @if($menuel['hasIcon'] === true)
                            @if($menuel['iconType'] === 'coreui')
                                <i class="{{ $menuel['icon'] }} c-sidebar-nav-icon"></i>
                            @endif
                        @endif 
                        {{ $menuel['name'] }}
                        </a>
                    </li>
                @elseif($menuel['slug'] === 'dropdown')
                    <?php renderDropdown($menuel) ?>
                @elseif($menuel['slug'] === 'title')
                    <li class="c-sidebar-nav-title">
                        @if($menuel['hasIcon'] === true)
                            @if($menuel['iconType'] === 'coreui')
                                <i class="{{ $menuel['icon'] }} c-sidebar-nav-icon"></i>
                            @endif
                        @endif 
                        {{ $menuel['name'] }}
                    </li>
                @endif
            @endforeach
        @endif
        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>