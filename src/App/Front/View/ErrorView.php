<?php
namespace KnotDoc\Di\App\Front\View;

use Psr\Http\Message\ResponseInterface;

class ErrorView extends BaseView
{
    /**
     * @return array
     */
    public function getCustomPageInfo() : array
    {
        return [
            'css' => [
            ],
            'javascript' => [
            ],
        ];
    }

    /**
     * 404: Not Found
     *
     * @param array $data
     * @param string $layout
     * @param string $page
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     *
     * @throws
     */
    public function status404(array $data, string $layout, string $page, ResponseInterface $response) : ResponseInterface
    {
        return $this->render($data, $layout, $page, $response);
    }
    /**
     * 500: Internal server error
     *
     * @param array $data
     * @param string $layout
     * @param string $page
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     *
     * @throws
     */
    public function status500(array $data, string $layout, string $page, ResponseInterface $response) : ResponseInterface
    {
        return $this->render($data, $layout, $page, $response);
    }
    /**
     * show error
     *
     * @param array $data
     * @param string $layout
     * @param string $page
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     *
     * @throws
     */
    public function showError(array $data, string $layout, string $page, ResponseInterface $response) : ResponseInterface
    {
        return $this->render($data, $layout, $page, $response);
    }
}