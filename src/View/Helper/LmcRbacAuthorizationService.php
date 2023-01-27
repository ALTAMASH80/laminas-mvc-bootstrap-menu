<?php 

namespace LRPHPT\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LmcRbacMvc\Service\AuthorizationService;
use LmcRbacMvc\Service\RoleService;

class LmcRbacAuthorizationService extends AbstractHelper{

    private $userAuthentication;
    private $rules;
    
    public function __construct(RoleService $authorizationService, array $rules){
        $this->userAuthentication = $authorizationService;
        $this->setRules($rules);
    }
    
    public function __invoke(){
        return $this;
    }
    
    public function setRules(array $rules)
    {
        $this->rules = [];
        
        foreach ($rules as $key => $value) {
            if (is_int($key)) {
                $routeRegex = $value;
                $roles      = [];
            } else {
                $routeRegex = $key;
                $roles      = (array) $value;
            }
            
            $this->rules[$routeRegex] = $roles;
        }
    }

    public function isGranted($routeName = '')
    {
        $allowedRoles = null;
        
        foreach (array_keys($this->rules) as $routeRule) {
            if (fnmatch($routeRule, $routeName, FNM_CASEFOLD)) {
                $allowedRoles = $this->rules[$routeRule];
                break;
            }
        }

        // If no rules apply, it is considered as granted or not based on the protection policy
        if (null === $allowedRoles || in_array('*', $allowedRoles)) {
            return true;
        }

        return $this->userAuthentication->matchIdentityRoles($allowedRoles);
    }
}
