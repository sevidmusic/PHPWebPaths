<?php

namespace Darling\PHPWebPaths\enumerations\paths\parts\url;

/**
 * A Scheme is part of a Url.
 *
 * For example:
 *
 *     https://sub.example.com:8080/path?query#fragment
 *     \___/
 *       |
 *     Scheme
 *
 * The Scheme enum defines the url schemes that are supported by the
 * PHPWebPaths library.
 *
 * A Scheme's value will be a lowercase string that consists of
 * a sequence of characters that begins with a letter and is followed
 * by any combination of letters [a-z], digits [0-9], pluses (+),
 * periods (.), or hyphens (-)
 *
 * All defined Schemes will abide by the url scheme specification
 * described in section 3.1 of RFC 3986:
 *
 * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.1
 *
 * The currently supported Schemes are those officially supported by
 * the IANA.
 *
 * @see https://www.iana.org/
 * @see https://en.wikipedia.org/wiki/List_of_URI_schemes#Official_IANA-registered_schemes
 *
 * The value property can be used to access the string value of
 * a Scheme.
 *
 * For example:
 *
 * $scheme = Scheme::Https;
 *
 * echo $scheme->value;
 *
 * // example output:
 * https
 *
 */
enum Scheme: string
{

    /** Diameter Protocol */
    case AAA = 'aaa';

    /** Diameter Protocol */
    case AAAS = 'aaas';

    /** Displaying product information and internal information */
    case ABOUT = 'about';

    /** Application Configuration Access Protocol */
    case ACAP = 'acap';

    /** Identifying user account */
    case ACCT = 'acct';

    /** Anonymous Customer Reference */
    case ACR = 'acr';

    /** Direct installation of Adium Xtras (plugins) */
    case ADIUMXTRA = 'adiumxtra';

    /** Accessing Apple Filing Protocol shares */
    case AFP = 'afp';

    /** Andrew File System global file names */
    case AFS = 'afs';

    /** Controlling AOL Instant Messenger */
    case AIM = 'aim';

    /** Experimental method of installing software using APT */
    case APT = 'apt';

    /** Attaching resources to MHTML pages */
    case ATTACHMENT = 'attachment';

    /** Link to an Active Worlds world */
    case AW = 'aw';

    /** Identifier for an AMSS broadcast */
    case AMSS = 'amss';

    /** Send e-money to a Barion e-money wallet */
    case BARION = 'barion';

    /** Open a search query on a BeShare server */
    case BESHARE = 'beshare';

    /** Send money to a Bitcoin address */
    case BITCOIN = 'bitcoin';

    /** Binary data access in browsers */
    case BLOB = 'blob';

    /** Join an existing bolo game */
    case BOLO = 'bolo';

    /** Launching Skype call (see also skype:) */
    case CALLTO = 'callto';

    /** Calendar access protocol */
    case CAP = 'cap';

    /** Used for the management of Google Chrome's settings. In contrast with other browsers, its preferences appear as web-pages instead of dialog boxes. May also be used to specify user interfaces built using XUL in Mozilla-based browsers*/
    case CHROME = 'chrome';

    /** Manage the settings of extensions which have been installed */
    case CHROMEEXTENSION = 'chrome-extension';

    /** No description available */
    case COMEVENTBRITEATTENDEE = 'com-eventbrite-attendee';

    /** Referencing individual parts of an SMTP/MIME message */
    case CID = 'cid';

    /** Constrained Application Protocol */
    case COAP = 'coap';

    /** Constrained Application Protocol */
    case COAPS = 'coaps';

    /** Accessing an Android content provider */
    case CONTENT = 'content';

    /** TV-Anytime Content Reference Identifier */
    case CRID = 'crid';

    /** Provides a link to a Concurrent Versions System (CVS) Repository */
    case CVS = 'cvs';

    /** Identifier for a DAB broadcast */
    case DAB = 'dab';

    /** Inclusion of small data items inline */
    case DATA = 'data';

    /** HTTP Extensions for Distributed Authoring (WebDAV) */
    case DAV = 'dav';

    /** Dictionary service protocol */
    case DICT = 'dict';

    /** No description available */
    case DLNAPLAYSINGLE = 'dlna-playsingle';

    /** No description available */
    case DLNAPLAYCONTAINER = 'dlna-playcontainer';

    /** Domain Name System */
    case DNS = 'dns';

    /** Direct Network Transfer Protocol */
    case DNTP = 'dntp';

    /** Digital object identifier, a digital identifier for any object of intellectual property */
    case DOI = 'doi';

    /** Identifier for a DRM broadcast */
    case DRM = 'drm';

    /** DTNRG research and development */
    case DTN = 'dtn';

    /** No description available */
    case DVB = 'dvb';

    /** Resources available using the eDonkey2000 network */
    case ED2K = 'ed2k';

    /** For examples */
    case EXAMPLE = 'example';

    /** FaceTime is a video conferencing software developed by Apple for iPhone 4, the fourth generation iPod Touch, and computers running Mac OS X */
    case FACETIME = 'facetime';

    /** Used for telefacsimile numbers */
    case FAX = 'fax';

    /** web feed subscription */
    case FEED = 'feed';

    /** Addressing files on local or network file systems */
    case FILE = 'file';

    /** Abandoned part of File API */
    case FILESYSTEM = 'filesystem';

    /** Querying user information using the Finger protocol */
    case FINGER = 'finger';

    /** Accessing another computer's files using the SSH protocol */
    case FISH = 'fish';

    /** Identifier for an FM broadcast */
    case FM = 'fm';

    /** FTP resources */
    case FTP = 'ftp';

    /** Used with the Gemini protocol */
    case GEMINI = 'gemini';

    /** A Uniform Resource Identifier for Geographic Locations */
    case GEO = 'geo';

    /** Starting chat with Gadu-Gadu user */
    case GG = 'gg';

    /** Provides a link to a GIT repository */
    case GIT = 'git';

    /** Gizmo5 calling link */
    case GIZMOPROJECT = 'gizmoproject';

    /** Common Name Resolution Protocol */
    case GO = 'go';

    /** Used with Gopher protocol */
    case GOPHER = 'gopher';

    /** Start a chat with a Google Talk user */
    case GTALK = 'gtalk';

    /** Used with H.323 multimedia communications */
    case H323 = 'h323';

    /** Displaying a help page on Microsoft Windows Help and Support Center */
    case HCP = 'hcp';

    /** HTTP resources */
    case HTTP = 'http';

    /** HTTP connections secured using SSL/TLS */
    case HTTPS = 'https';

    /** Inter-Asterisk eXchange protocol version 2 */
    case IAX = 'iax';

    /** Internet Content Adaptation Protocol */
    case ICAP = 'icap';

    /** No description available */
    case ICON = 'icon';

    /** Instant messaging protocol */
    case IM = 'im';

    /** Accessing e-mail resources through IMAP */
    case IMAP = 'imap';

    /** Information Assets with Identifiers in Public Namespaces */
    case INFO = 'info';

    /** Identify things on Internet of Things */
    case IOTDISCO = 'iotdisco';

    /** No description available */
    case IPN = 'ipn';

    /** Internet Printing Protocol */
    case IPP = 'ipp';

    /** Internet Printing Protocol over HTTPS */
    case IPPS = 'ipps';

    /** Connecting to an Internet Relay Chat server to join a channel */
    case IRC = 'irc';

    /** IPv6 equivalent of irc */
    case IRC6 = 'irc6';

    /** Secure equivalent of irc */
    case IRCS = 'ircs';

    /** Internet Registry Information Service */
    case IRIS = 'iris';

    /** Internet Registry Information Service */
    case IRISBEEP = 'iris.beep';

    /** Internet Registry Information Service */
    case IRISXPC = 'iris.xpc';

    /** Internet Registry Information Service */
    case IRISXPCS = 'iris.xpcs';

    /** Internet Registry Information Service */
    case IRISLWS = 'iris.lws';

    /** Used for connecting to the iTunes Music Store */
    case ITMS = 'itms';

    /** No description available */
    case JABBER = 'jabber';

    /** Compressed archive member */
    case JAR = 'jar';

    /** Java Message Service */
    case JMS = 'jms';

    /** Keyparc encrypt/decrypt resource */
    case KEYPARC = 'keyparc';

    /** Connecting to a radio stream from Last.fm */
    case LASTFM = 'lastfm';

    /** LDAP directory request */
    case LDAP = 'ldap';

    /** Secure equivalent of ldap */
    case LDAPS = 'ldaps';

    /** "magnet links" */
    case MAGNET = 'magnet';

    /** Access to data available from mail servers */
    case MAILSERVER = 'mailserver';

    /** SMTP e-mail addresses and default content */
    case MAILTO = 'mailto';

    /** "map links" */
    case MAPS = 'maps';

    /** Opens Google Play */
    case MARKET = 'market';

    /** Direct link to specific email message */
    case MESSAGE = 'message';

    /** Referencing SMTP/MIME messages, or parts of messages */
    case MID = 'mid';

    /** Windows streaming media */
    case MMS = 'mms';

    /** No description available */
    case MODEM = 'modem';

    /** Displaying a help page on Microsoft Windows Help and Support Center. Used by Windows Vista and later */
    case MSHELP = 'ms-help';

    /** Settings application in Windows */
    case MSSETTINGS = 'ms-settings';

    /** Settings application in Windows */
    case MSSETTINGSAIRPLANEMODE = 'ms-settings-airplanemode';

    /** Settings application in Windows */
    case MSSETTINGSBLUETOOTH = 'ms-settings-bluetooth';

    /** Settings application in Windows */
    case MSSETTINGSCAMERA = 'ms-settings-camera';

    /** Settings application in Windows */
    case MSSETTINGSCELLULAR = 'ms-settings-cellular';

    /** Settings application in Windows */
    case MSSETTINGSCLOUDSTORAGE = 'ms-settings-cloudstorage';

    /** Settings application in Windows */
    case MSSETTINGSEMAILANDACCOUNTS = 'ms-settings-emailandaccounts';

    /** Settings application in Windows */
    case MSSETTINGSLANGUAGE = 'ms-settings-language';

    /** Settings application in Windows */
    case MSSETTINGSLOCATION = 'ms-settings-location';

    /** Settings application in Windows */
    case MSSETTINGSLOCK = 'ms-settings-lock';

    /** Settings application in Windows */
    case MSSETTINGSNFCTRANSACTIONS = 'ms-settings-nfctransactions';

    /** Settings application in Windows */
    case MSSETTINGSNOTIFICATIONS = 'ms-settings-notifications';

    /** Settings application in Windows */
    case MSSETTINGSPOWER = 'ms-settings-power';

    /** Settings application in Windows */
    case MSSETTINGSPRIVACY = 'ms-settings-privacy';

    /** Settings application in Windows */
    case MSSETTINGSPROXIMITY = 'ms-settings-proximity';

    /** Settings application in Windows */
    case MSSETTINGSSCREENROTATION = 'ms-settings-screenrotation';

    /** Settings application in Windows */
    case MSSETTINGSWIFI = 'ms-settings-wifi';

    /** Settings application in Windows */
    case MSSETTINGSWORKPLACE = 'ms-settings-workplace';

    /** Adding a contact, or starting a conversation in Windows Live Messenger */
    case MSNIM = 'msnim';

    /** Message Session Relay Protocol */
    case MSRP = 'msrp';

    /** Message Session Relay Protocol */
    case MSRPS = 'msrps';

    /** Message Tracking Query Protocol */
    case MTQP = 'mtqp';

    /** Joining a server */
    case MUMBLE = 'mumble';

    /** Mailbox Update Protocol */
    case MUPDATE = 'mupdate';

    /** Access Apache Maven repository artifacts */
    case MVN = 'mvn';

    /** (Usenet) newsgroups and postings */
    case NEWS = 'news';

    /** Network File System resources */
    case NFS = 'nfs';

    /** Naming Things with Hashes */
    case NI = 'ni';

    /** Naming Things with Hashes */
    case NIH = 'nih';

    /** Usenet NNTP */
    case NNTP = 'nntp';

    /** Open a Lotus Notes document or database */
    case NOTES = 'notes';

    /** No description available */
    case OID = 'oid';

    /** No description available */
    case OPAQUELOCKTOKEN = 'opaquelocktoken';

    /** Used to identify OpenPGP version 4 public keys */
    case OPENPGP4FPR = 'openpgp4fpr';

    /** No description available */
    case PACK = 'pack';

    /** Used to designate system services in HP webOS applications */
    case PALM = 'palm';

    /** Used to launch and automatically take a screen shot using the application "Paparazzi!" (Mac only) */
    case PAPARAZZI = 'paparazzi';

    /** Designate target for payments */
    case PAYTO = 'payto';

    /** PKCS #11 */
    case PKCS11 = 'pkcs11';

    /** Access to Eclipse platform resources */
    case PLATFORM = 'platform';

    /** Accessing mailbox through POP3 */
    case POP = 'pop';

    /** Used in Common Profile for Presence (CPP) to identify presence */
    case PRES = 'pres';

    /** Prospero Directory Service */
    case PROSPERO = 'prospero';

    /** Alter proxy settings in the FoxyProxy application */
    case PROXY = 'proxy';

    /** Used to identify or locate a person, group, place or a service and specify its ability to communicate */
    case PSYC = 'psyc';

    /** Opens a filesystem query */
    case QUERY = 'query';

    /** Redis database */
    case REDIS = 'redis';

    /** Redis database */
    case REDISS = 'rediss';

    /** REsource LOcation And Discovery Protocol */
    case RELOAD = 'reload';

    /** Used by Internet Explorer to display error pages when the server doesn't have its own customized error pages, or when there is no response from the server (in case which the server wasn't found, like when the server is down or the domain isn't registered or when there is no Internet connection, or in case of a timeout) */
    case RES = 'res';

    /** Creating mapping for resource protocol aliases generted by the resource instruction. Used by Firefox.[1] */
    case RESOURCE = 'resource';

    /** Look up a Java object in an RMI registry */
    case RMI = 'rmi';

    /** rsync */
    case RSYNC = 'rsync';

    /** Real Time Media Flow Protocol */
    case RTMFP = 'rtmfp';

    /** Real Time Messaging Protocol */
    case RTMP = 'rtmp';

    /** Real Time Streaming Protocol */
    case RTSP = 'rtsp';

    /** Open the Map floater in Second Life application to teleport the resident to the location */
    case SECONDLIFE = 'secondlife';

    /** No description available */
    case SERVICE = 'service';

    /** Media Resource Control Protocol */
    case SESSION = 'session';

    /** SFTP file transfers (not be to confused with FTPS (FTP/SSL)) */
    case SFTP = 'sftp';

    /** Social Graph Node Mapper */
    case SGN = 'sgn';

    /** SMART Health Cards Framework */
    case SHC = 'shc';

    /** Secure HTTP */
    case SHTTP = 'shttp';

    /** ManageSieve protocol */
    case SIEVE = 'sieve';

    /** Used with Session Initiation Protocol (SIP) */
    case SIP = 'sip';

    /** Secure equivalent of sip */
    case SIPS = 'sips';

    /** Launching Skype call (see also callto:) */
    case SKYPE = 'skype';

    /** Accessing SMB/CIFS shares */
    case SMB = 'smb';

    /** Interact with SMS capable devices for composing and sending messages */
    case SMS = 'sms';

    /** NNTP over SSL/TLS */
    case SNEWS = 'snews';

    /** Simple Network Management Protocol */
    case SNMP = 'snmp';

    /** No description available */
    case SOAPBEEP = 'soap.beep';

    /** No description available */
    case SOAPBEEPS = 'soap.beeps';

    /** Joining servers */
    case SOLDAT = 'soldat';

    /** Load a track, album, artist, search, or playlist in Spotify */
    case SPOTIFY = 'spotify';

    /** SSH connections (like telnet:) */
    case SSH = 'ssh';

    /** Interact with Steam: install apps, purchase games, run games, etc */
    case STEAM = 'steam';

    /** Session Traversal Utilities for NAT (STUN) */
    case STUN = 'stun';

    /** Session Traversal Utilities for NAT (STUN) */
    case STUNS = 'stuns';

    /** Provides a link to a Subversion (SVN) source control repository */
    case SVN = 'svn';

    /** tag URI scheme */
    case TAG = 'tag';

    /** Joining a server */
    case TEAMSPEAK = 'teamspeak';

    /** Used for telephone numbers */
    case TEL = 'tel';

    /** Used with telnet */
    case TELNET = 'telnet';

    /** Trivial File Transfer Protocol */
    case TFTP = 'tftp';

    /** Interact with Things: create new to-dos or go to a specific list */
    case THINGS = 'things';

    /** multipart/related relative reference resolution */
    case THISMESSAGE = 'thismessage';

    /** Interactive 3270 emulation sessions */
    case TN3270 = 'tn3270';

    /** Transaction Internet Protocol */
    case TIP = 'tip';

    /** Traversal Using Relays around NAT (TURN) */
    case TURN = 'turn';

    /** Traversal Using Relays around NAT (TURN) */
    case TURNS = 'turns';

    /** TV Broadcasts */
    case TV = 'tv';

    /** BitTorrent or MPEG tracker protocol based on UDP */
    case UDP = 'udp';

    /** Joining servers */
    case UNREAL = 'unreal';

    /** Uniform Resource Names */
    case URN = 'urn';

    /** Joining servers */
    case UT2004 = 'ut2004';

    /** Versatile Multimedia Interface */
    case VEMMI = 'vemmi';

    /** Joining a server */
    case VENTRILO = 'ventrilo';

    /** No description available */
    case VIDEOTEX = 'videotex';

    /** Shows a web page as code 'in the raw' */
    case VIEWSOURCE = 'view-source';

    /** Virtual Network Computing */
    case VNC = 'vnc';

    /** Used with Wide area information server (WAIS) */
    case WAIS = 'wais';

    /** Subscribing to calendars in iCalendar format */
    case WEBCAL = 'webcal';

    /** WebSocket protocol */
    case WS = 'ws';

    /** WebSocket protocol */
    case WSS = 'wss';

    /** Wireless Telephony Application Interface */
    case WTAI = 'wtai';

    /** What You Cache Is What You Get WYCIWYG */
    case WYCIWYG = 'wyciwyg';

    /** No description available */
    case XCON = 'xcon';

    /** No description available */
    case XCONUSERID = 'xcon-userid';

    /** Adding friends and servers, joining servers, changing status text */
    case XFIRE = 'xfire';

    /** No description available */
    case XMLRPCBEEP = 'xmlrpc.beep';

    /** No description available */
    case XMLRPCBEEPS = 'xmlrpc.beeps';

    /** XMPP */
    case XMPP = 'xmpp';

    /** eXtensible Resource Identifier (XRI) */
    case XRI = 'xri';

    /** Sending an instant message to a Yahoo! Contact */
    case YMSGR = 'ymsgr';

    /** Z39.50 information access */
    case Z3950 = 'z39.50';

    /** Z39.50 retrieval */
    case Z3950R = 'z39.50r';

    /** Z39.50 session */
    case Z3950S = 'z39.50s';

}

