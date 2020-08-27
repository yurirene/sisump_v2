<?php 

function site(string $param =null):string    
{
    
    if($param && !empty(SITE[$param])){
        return SITE[$param];
    }
    
    return SITE['root'];
    
}



function assets(string $path): string
{
    return SITE['root']."/views/assets/{$path}";
}

function url(string $uri): string
{
    return SITE['root']."/".$uri;
}

function flash(string $type=null, string $message=null): void
{
    if($type && $message){
        $_SESSION['flash'] = "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>{$message}
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times</span>
                                </button>
                            </div>";
        return;
    }
    if(!empty($_SESSION['flash'])){
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
        return;
    }
}


?>