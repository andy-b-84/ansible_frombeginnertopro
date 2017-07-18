# (Git+UTF-8) vs. FAT-32 #
Ansible's source code cannot be cloned on a FAT-32 formatted disk (it has a UTF-8 file with Japanese caracters in it, which the `git clone` command does not suport.

# Virtualbox vs. (Fedora 26 on a brand new Thinkpad) #
Virtualbox over Fedora 26 in July 2017 XD

## Virtualization instructions in BIOS ##
I had a new ThnikPad, OF COURSE virtualization instructions were disabled in the BIOS

## Oracle RPM repo ##
OK, Oracle maintains a Fedora compatible RPM repository, thank them for that.
Now, Fedora 26 was out for a week when I instaled VirtualBox, and the `/26` folder didn't exist in http://download.virtualbox.org/virtualbox/rpm/fedora/ , so I had to add the `--releasever=26` option to the `dnf install` command.
AND the last RPM gave a 404 HTTP code when I tried to download it, be it with `dnf` or `curl` :) so I had to specify `VirtualBox-5.1-5.1.22_115126_fedora25-1.x86_64` instead of a smaller `VirtualBox-5.1`

## Unsigned VirtualBox modules vs. secure EFI boot ##
VirtualBox builds modules in order to use your disks, network interfaces, RAM, and so on, efficiently.
My ThinkPad comes with a secure EFI boot, which Fedora 26 uses seamlessly.
These 2 things just don't add up.
I had to create a certificate and sign these modules myself, following this : https://gorka.eguileor.com/vbox-vmware-in-secureboot-linux-2016-update/

# Networking #
Network connections for virtualbox : got to run `sudo modprobe vboxnetadp` and `sudo modprobe vboxnetflt` in order to have a dedicated IP for my VM.

# SSH #

## Fingerprint ##
In chapter 2 I had to launch ansible without vagrant : it tried to connect using ssh : it goes without saying that ansible cannot accept the machine's fingerprint by itself, so : when you're going to ssh over a server, do it yourself first, then tell Ansible how to do it :)

## Permissions ##

'Nix SSH permissions! Yay!
Got that error message:
```
fatal: [machines/default/virtualbox/private_key]: UNREACHABLE! => {"changed": false, "msg": "Failed to connect to the host via ssh: ssh: Could not resolve hostname machines/default/virtualbox/private_key: Name or service not known\r\n", "unreachable": true}
fatal: [192.168.33.10]: UNREACHABLE! => {"changed": false, "msg": "Failed to connect to the host via ssh: @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\r\n@         WARNING: UNPROTECTED PRIVATE KEY FILE!          @\r\n@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\r\nPermissions 0775 for '.vagrant/' are too open.\r\nIt is required that your private key files are NOT accessible by others.\r\nThis private key will be ignored.\r\nLoad key \".vagrant/\": bad permissions\r\nPermission denied (publickey,password).\r\n", "unreachable": true}
```

which you'll easily get rid of by typing these:
```
chmod 700 .vagrant
chmod 600 .vagrant/machines/default/virtualbox/private_key
```