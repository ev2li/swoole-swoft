<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://swoft.org/docs
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;
use function context;

/**
 * Class ControllerMiddleware - Custom middleware
 * @Bean()
 * @package App\Http\Middleware
 */
class ControllerMiddleware implements MiddlewareInterface
{
   /**
     * Process an incoming server request.
     *
     * @param ServerRequestInterface|Request  $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     * @throws SwoftException
     * @inheritdoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($request->getUriPath() === '/favicon.ico') {
            return context()->getResponse()->withStatus(404);
        }

        // before request handle
        /** @var  $ret \Swoft\Http\Message\Response*/
        $ret =$handler->handle($request);
        $p1 = $ret->getData();
        if(is_object($p1)){
            return response(ContentType::JSON)->withData(json_encode($p1));
        }
       /* $data[] = $p1;
        $p2 = NewPro(1000, "中间件加入的商品");
        $data[] = $p2;
        return response(ContentType::JSON)->withData($data);*/
        // after request handle
        return response(ContentType::JSON)->withData(json_encode($p1));
    }
}
