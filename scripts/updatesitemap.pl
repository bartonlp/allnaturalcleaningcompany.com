#!/usr/bin/perl -w
# Update the Sitemap.xml file
# Read the data from the sitemap.txt file

use strict;
use Getopt::Long qw(GetOptions);
use Pod::Usage;
use File::Basename;

my $help = 0;
my $man = 0;

GetOptions('help|?' => \$help,
	   'man' => \$man) or pod2usage(2);

pod2usage(1) if $help;
pod2usage(-exitval => 0, -verbose => 2) if $man;

print <<'EOF';
<?xml version="1.0" encoding="UTF-8"?>
<urlset  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

EOF
              
while(<>) {
  next if /^\s$/;
  chomp;

  my $file = basename($_);

  next if not -e $file;
  
  print "\t<url>\n\t\t<loc>$_</loc>\n";

  my($dev,$ino,$mode,$nlink,$uid,$gid,$rdev,$size,
   $atime,$mtime,$ctime,$blksize,$blocks)
      = stat($file);

  my($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime($mtime);

  printf("\t\t<lastmod>%d-%02d-%02d</lastmod>\n", $year+1900, $mon+1, $mday);

  print "\t</url>\n";
}
print "</urlset>\n";
__END__

=head1 SYNOPSIS

updatesitemap.pl [options] <file with the names of files to include in site map>

=head1 OPTIONS

B<help>:              Print out a breif help statement.

B<man>:               Print out the full man page.

=head1 DESCRIPTION

Read from stdin a text file with the names of the file. Gather the last modified information and output
the xml file to stdout. This program is used to create a Sitemap.xml from a text file with file
names (filelist.txt). Once the Sitemap.xml is created a cron job runs updatemodtime.pl to update
the times in the Sitemap.xml.
 
=cut
 