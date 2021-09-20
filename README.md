# MobWeb_DisableAddressModification

A simple extension for Magento 2 (tested on 2.4.3) that disables all the controllers where a customer can add, delete of modify an address in their customer account. When the customer tries to access one of these controllers, an error message is shown.

## Important

This does *not* hide any of the buttons/links where a customer can modify their address. This would have to be done in your theme instead. It does *not* modify the checkout at all, as we would also have to make these changes in the theme.