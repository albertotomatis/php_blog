<?php
interface Routes {
    public function getRoutes(): array ;
    public function getAuthentication(): Authentication;
    public function checkPermission($permission): bool;
}