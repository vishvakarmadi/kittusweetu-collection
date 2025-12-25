<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('checkRoleAccess')) {
    function checkRoleAccess($requiredRole = 'admin') {
        // Check if user is logged in
        if (!isset($_SESSION["login_satus"]) || $_SESSION["login_satus"] != true) {
            header("location:index.php");
            exit();
        }
        
        // Get user role, default to 'admin' if not set
        $userRole = isset($_SESSION['admin_role']) ? $_SESSION['admin_role'] : 'admin';
        
        // Define role hierarchy (higher roles can access lower role features)
        $roleHierarchy = [
            'super_admin' => 3,
            'admin' => 2,
            'moderator' => 1
        ];
        
        // Check if user's role meets the required role
        $userLevel = isset($roleHierarchy[$userRole]) ? $roleHierarchy[$userRole] : 1;
        $requiredLevel = isset($roleHierarchy[$requiredRole]) ? $roleHierarchy[$requiredRole] : 2;
        
        if ($userLevel < $requiredLevel) {
            // User doesn't have required role, redirect to dashboard
            header("location:dashbord.php?error=access_denied");
            exit();
        }
        
        return true;
    }
}

// Function to get user's role
if (!function_exists('getUserRole')) {
    function getUserRole() {
        return isset($_SESSION['admin_role']) ? $_SESSION['admin_role'] : 'admin';
    }
}

// Function to check if user has specific permission
if (!function_exists('hasRole')) {
    function hasRole($role) {
        return getUserRole() === $role;
    }
}

// Function to check if user has admin or higher privileges
if (!function_exists('isAdmin')) {
    function isAdmin() {
        $userRole = getUserRole();
        return ($userRole === 'admin' || $userRole === 'super_admin');
    }
}

// Function to check if user has moderator or higher privileges
if (!function_exists('isModerator')) {
    function isModerator() {
        $userRole = getUserRole();
        return ($userRole === 'moderator' || $userRole === 'admin' || $userRole === 'super_admin');
    }
}
?>