SGH_JsonRpc
===========

Magento extension that adds an API adapter for JSON-RPC format (works with Magento API V1, the same way as XML-RPC from Magento core). This is especially useful for clients written in JavaScript.

Installation
====

With Composer
----

    "require": {
        "sgh/jsonrpc": "~1.0",
    }
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/sgh-it/jsonrpc.git"
        }
    ]

Manually
----

1. Download Source Code
2. Copy `src/app` into the Magento installation directory (no files are overwritten, just added)


Usage
====

The API entry point is `https://your.domain/api/jsonrpc`

It works the same way as XML-RPC just with a different transport format, so refer to the official API documentation at http://www.magentocommerce.com/api/soap/introduction.html#Introduction-XMLRPC
