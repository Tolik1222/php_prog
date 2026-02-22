<?php
abstract class View {
    abstract public function render($viewPath, $data = []);
}