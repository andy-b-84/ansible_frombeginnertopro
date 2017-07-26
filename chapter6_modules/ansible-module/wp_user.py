#!/usr/bin/python
from ansible.module_utils.basic import *
import xmlrpclib

def main():
    module = AnsibleModule(
        argument_spec = dict(
            url          = dict(required=True),
            username     = dict(aliases=['name'], required=True),
            password     = dict(required=False, no_log=True),
            first_name   = dict(required=False),
            last_name    = dict(required=False),
            user_url     = dict(required=False),
            display_name = dict(required=False),
            nickname     = dict(required=False),
            nicename     = dict(required=False),
            bio          = dict(required=False)
        )
    )

    params = module.params

    server = xmlrpclib.ServerProxy('%s/xmlrpc.php' % params['url'], use_datetime=True)
    details = {}
    skip_fields = ['username','name','password','url']
    mappings = {"user_url": "url"}
    for k, v in params.iteritems():
        if k in skip_fields:
            continue
        if v:
            if k in mappings:
                k = mappings[k]
            details[k] = v
    res = server.wp.editProfile(1, params['username'], params['password'], details)
    
    module.exit_json(changed=True, name=res)

if __name__ == '__main__':
    main()
