<?php

namespace App\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CorsMiddleware
{
    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();

        //Allow from any origin
        if($request->headers->has('Origin')){
            $responseHeaders['Access-Control-Allow-Origin'] = $request->headers->get('Origin');
            $responseHeaders['Access-Control-Allow-Credentials'] = 'true';
            $responseHeaders['Access-Control-Allow-Headers'] = 'Authorization';
            $responseHeaders['Access-Control-Allow-Methods'] = 'POST,GET,PUT,DELETE,OPTIONS';

            $event->setResponse(new Response('',Response::HTTP_OK,$responseHeaders));
            
        }
    }
}