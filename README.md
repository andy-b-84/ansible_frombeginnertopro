# 1st blocking point #
Ansible's source code cannot be cloned on a FAT-32 formatted disk (it has a UTF-8 file with Japanese caracters in it, which the `git clone` command does not suport.

# 2nd blocking point#
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

# 3rd blocking point #
Network connections for virtualbox : got to run `sudo modprobe vboxnetadp` and `sudo modprobe vboxnetflt` in order to have a dedicated IP for my VM.