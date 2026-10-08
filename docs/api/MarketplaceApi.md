# marketplace

Access with `$client->marketplace()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `createExpertAccount()` | `POST /api/marketplace/expert/accounts` | `MarketplaceController_createExpertAccount` |
| `getMyExpertAccount()` | `GET /api/marketplace/expert/accounts/me` | `MarketplaceController_getMyExpertAccount` |
| `updateMyExpertProfile()` | `PATCH /api/marketplace/expert/accounts/me` | `MarketplaceController_updateMyExpertProfile` |
| `submitVerification()` | `POST /api/marketplace/expert/verifications` | `MarketplaceController_submitVerification` |
| `acceptExpertTerms()` | `POST /api/marketplace/expert/terms` | `MarketplaceController_acceptExpertTerms` |
| `reviewVerification()` | `POST /api/marketplace/admin/verifications/{verificationId}/review` | `MarketplaceController_reviewVerification` |
| `onboardExpertStripe()` | `POST /api/marketplace/expert/stripe-connect` | `MarketplaceController_onboardExpertStripe` |
| `getExpertStripeStatus()` | `GET /api/marketplace/expert/stripe-connect/status` | `MarketplaceController_getExpertStripeStatus` |
| `publishMyProfile()` | `POST /api/marketplace/expert/accounts/me/publish` | `MarketplaceController_publishMyProfile` |
| `unpublishMyProfile()` | `POST /api/marketplace/expert/accounts/me/unpublish` | `MarketplaceController_unpublishMyProfile` |
| `addAvailabilitySlot()` | `POST /api/marketplace/expert/availability` | `MarketplaceController_addAvailabilitySlot` |
| `listMyAvailabilitySlots()` | `GET /api/marketplace/expert/availability` | `MarketplaceController_listMyAvailabilitySlots` |
| `updateAvailabilitySlot()` | `PATCH /api/marketplace/expert/availability/{slotId}` | `MarketplaceController_updateAvailabilitySlot` |
| `deleteAvailabilitySlot()` | `DELETE /api/marketplace/expert/availability/{slotId}` | `MarketplaceController_deleteAvailabilitySlot` |
| `searchExperts()` | `GET /api/marketplace/experts` | `MarketplaceController_searchExperts` |
| `listExpertReviews()` | `GET /api/marketplace/experts/{expertAccountId}/reviews` | `MarketplaceController_listExpertReviews` |
| `favoriteExpert()` | `POST /api/marketplace/favorites` | `MarketplaceController_favoriteExpert` |
| `listFavorites()` | `GET /api/marketplace/favorites` | `MarketplaceController_listFavorites` |
| `unfavoriteExpert()` | `DELETE /api/marketplace/favorites/{expertAccountId}` | `MarketplaceController_unfavoriteExpert` |
| `rebookFavoriteExpert()` | `POST /api/marketplace/favorites/{expertAccountId}/rebook` | `MarketplaceController_rebookFavoriteExpert` |
| `moderateProfile()` | `POST /api/marketplace/admin/expert-accounts/{expertAccountId}/moderate` | `MarketplaceController_moderateProfile` |
| `removeReview()` | `POST /api/marketplace/admin/reviews/{reviewId}/remove` | `MarketplaceController_removeReview` |
| `assignRole()` | `POST /api/marketplace/admin/users/{userId}/roles/{roleType}` | `MarketplaceController_assignRole` |
| `revokeRole()` | `POST /api/marketplace/admin/roles/{roleType}/revoke` | `MarketplaceController_revokeRole` |
| `createRequest()` | `POST /api/marketplace/requests` | `MarketplaceController_createRequest` |
| `listRequests()` | `GET /api/marketplace/requests` | `MarketplaceController_listRequests` |
| `getRequest()` | `GET /api/marketplace/requests/{requestId}` | `MarketplaceController_getRequest` |
| `updateRequest()` | `PATCH /api/marketplace/requests/{requestId}` | `MarketplaceController_updateRequest` |
| `sendRequest()` | `POST /api/marketplace/requests/{requestId}/send` | `MarketplaceController_sendRequest` |
| `withdrawRequest()` | `POST /api/marketplace/requests/{requestId}/withdraw` | `MarketplaceController_withdrawRequest` |
| `pauseRequest()` | `POST /api/marketplace/requests/{requestId}/pause` | `MarketplaceController_pauseRequest` |
| `closeRequest()` | `POST /api/marketplace/requests/{requestId}/close` | `MarketplaceController_closeRequest` |
| `inviteExpertToRequest()` | `POST /api/marketplace/requests/{requestId}/invitations` | `MarketplaceController_inviteExpertToRequest` |
| `createProposal()` | `POST /api/marketplace/proposals` | `MarketplaceController_createProposal` |
| `listProposals()` | `GET /api/marketplace/proposals` | `MarketplaceController_listProposals` |
| `acceptProposal()` | `POST /api/marketplace/proposals/{proposalId}/accept` | `MarketplaceController_acceptProposal` |
| `declineProposal()` | `POST /api/marketplace/proposals/{proposalId}/decline` | `MarketplaceController_declineProposal` |
| `declineInvitation()` | `POST /api/marketplace/proposals/{proposalId}/decline-invitation` | `MarketplaceController_declineInvitation` |
| `counterProposal()` | `POST /api/marketplace/proposals/{proposalId}/counter` | `MarketplaceController_counterProposal` |
| `createServiceOffer()` | `POST /api/marketplace/expert/service-offers` | `MarketplaceController_createServiceOffer` |
| `listMyServiceOffers()` | `GET /api/marketplace/expert/service-offers` | `MarketplaceController_listMyServiceOffers` |
| `updateServiceOffer()` | `PATCH /api/marketplace/expert/service-offers/{offerId}` | `MarketplaceController_updateServiceOffer` |
| `publishServiceOffer()` | `POST /api/marketplace/expert/service-offers/{offerId}/publish` | `MarketplaceController_publishServiceOffer` |
| `pauseServiceOffer()` | `POST /api/marketplace/expert/service-offers/{offerId}/pause` | `MarketplaceController_pauseServiceOffer` |
| `archiveServiceOffer()` | `POST /api/marketplace/expert/service-offers/{offerId}/archive` | `MarketplaceController_archiveServiceOffer` |
| `searchServiceOffers()` | `GET /api/marketplace/service-offers` | `MarketplaceController_searchServiceOffers` |
| `getServiceOffer()` | `GET /api/marketplace/service-offers/{idOrSlug}` | `MarketplaceController_getServiceOffer` |
| `bookServiceOffer()` | `POST /api/marketplace/service-offers/{offerId}/book` | `MarketplaceController_bookServiceOffer` |
| `createBooking()` | `POST /api/marketplace/bookings` | `MarketplaceController_createBooking` |
| `listBookings()` | `GET /api/marketplace/bookings` | `MarketplaceController_listBookings` |
| `getBooking()` | `GET /api/marketplace/bookings/{bookingId}` | `MarketplaceController_getBooking` |
| `rebookCompletedBooking()` | `POST /api/marketplace/bookings/{bookingId}/rebook` | `MarketplaceController_rebookCompletedBooking` |
| `createBookingReview()` | `POST /api/marketplace/bookings/{bookingId}/reviews` | `MarketplaceController_createBookingReview` |
| `reportReview()` | `POST /api/marketplace/reviews/{reviewId}/report` | `MarketplaceController_reportReview` |
| `getWorkSummary()` | `GET /api/marketplace/bookings/{bookingId}/work-summary` | `MarketplaceController_getWorkSummary` |
| `createTimeEntry()` | `POST /api/marketplace/bookings/{bookingId}/time-entries` | `MarketplaceController_createTimeEntry` |
| `submitTimeEntry()` | `POST /api/marketplace/bookings/{bookingId}/time-entries/{timeEntryId}/submit` | `MarketplaceController_submitTimeEntry` |
| `reviewTimeEntry()` | `POST /api/marketplace/bookings/{bookingId}/time-entries/{timeEntryId}/review` | `MarketplaceController_reviewTimeEntry` |
| `createMilestone()` | `POST /api/marketplace/bookings/{bookingId}/milestones` | `MarketplaceController_createMilestone` |
| `submitMilestone()` | `POST /api/marketplace/bookings/{bookingId}/milestones/{milestoneId}/submit` | `MarketplaceController_submitMilestone` |
| `reviewMilestone()` | `POST /api/marketplace/bookings/{bookingId}/milestones/{milestoneId}/review` | `MarketplaceController_reviewMilestone` |
| `updateBookingStatus()` | `PATCH /api/marketplace/bookings/{bookingId}/status` | `MarketplaceController_updateBookingStatus` |
| `createServiceAgreement()` | `POST /api/marketplace/service-agreements` | `MarketplaceController_createServiceAgreement` |
| `acceptServiceAgreement()` | `POST /api/marketplace/bookings/{bookingId}/service-agreement/accept` | `MarketplaceController_acceptServiceAgreement` |

## `createExpertAccount()`

MarketplaceController_createExpertAccount

```php
$client->marketplace()->createExpertAccount(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateExpertAccountDto"
      }
    }
  }
}
```


## `getMyExpertAccount()`

MarketplaceController_getMyExpertAccount

```php
$client->marketplace()->getMyExpertAccount(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateMyExpertProfile()`

MarketplaceController_updateMyExpertProfile

```php
$client->marketplace()->updateMyExpertProfile(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateExpertProfileDto"
      }
    }
  }
}
```


## `submitVerification()`

MarketplaceController_submitVerification

```php
$client->marketplace()->submitVerification(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateExpertVerificationDto"
      }
    }
  }
}
```


## `acceptExpertTerms()`

MarketplaceController_acceptExpertTerms

```php
$client->marketplace()->acceptExpertTerms(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `reviewVerification()`

MarketplaceController_reviewVerification

```php
$client->marketplace()->reviewVerification(string $verificationId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.verificationId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ReviewVerificationDto"
      }
    }
  }
}
```


## `onboardExpertStripe()`

MarketplaceController_onboardExpertStripe

```php
$client->marketplace()->onboardExpertStripe(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getExpertStripeStatus()`

MarketplaceController_getExpertStripeStatus

```php
$client->marketplace()->getExpertStripeStatus(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `publishMyProfile()`

MarketplaceController_publishMyProfile

```php
$client->marketplace()->publishMyProfile(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `unpublishMyProfile()`

MarketplaceController_unpublishMyProfile

```php
$client->marketplace()->unpublishMyProfile(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `addAvailabilitySlot()`

MarketplaceController_addAvailabilitySlot

```php
$client->marketplace()->addAvailabilitySlot(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateExpertAvailabilitySlotDto"
      }
    }
  }
}
```


## `listMyAvailabilitySlots()`

MarketplaceController_listMyAvailabilitySlots

```php
$client->marketplace()->listMyAvailabilitySlots(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateAvailabilitySlot()`

MarketplaceController_updateAvailabilitySlot

```php
$client->marketplace()->updateAvailabilitySlot(string $slotId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.slotId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateExpertAvailabilitySlotDto"
      }
    }
  }
}
```


## `deleteAvailabilitySlot()`

MarketplaceController_deleteAvailabilitySlot

```php
$client->marketplace()->deleteAvailabilitySlot(string $slotId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.slotId` (required): {"type": "string"}

## `searchExperts()`

MarketplaceController_searchExperts

```php
$client->marketplace()->searchExperts(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `listExpertReviews()`

MarketplaceController_listExpertReviews

```php
$client->marketplace()->listExpertReviews(string $expertAccountId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.expertAccountId` (required): {"type": "string"}

## `favoriteExpert()`

MarketplaceController_favoriteExpert

```php
$client->marketplace()->favoriteExpert(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/FavoriteExpertDto"
      }
    }
  }
}
```


## `listFavorites()`

MarketplaceController_listFavorites

```php
$client->marketplace()->listFavorites(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.organizationId` (required): {"type": "string"}

## `unfavoriteExpert()`

MarketplaceController_unfavoriteExpert

```php
$client->marketplace()->unfavoriteExpert(string $expertAccountId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.expertAccountId` (required): {"type": "string"}
- `query.organizationId` (required): {"type": "string"}

## `rebookFavoriteExpert()`

MarketplaceController_rebookFavoriteExpert

```php
$client->marketplace()->rebookFavoriteExpert(string $expertAccountId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.expertAccountId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RebookMarketplaceDto"
      }
    }
  }
}
```


## `moderateProfile()`

MarketplaceController_moderateProfile

```php
$client->marketplace()->moderateProfile(string $expertAccountId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.expertAccountId` (required): {"type": "string"}

## `removeReview()`

MarketplaceController_removeReview

```php
$client->marketplace()->removeReview(string $reviewId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.reviewId` (required): {"type": "string"}

## `assignRole()`

MarketplaceController_assignRole

```php
$client->marketplace()->assignRole(string $userId, string $roleType, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.userId` (required): {"type": "string"}
- `path.roleType` (required): {"type": "string"}

## `revokeRole()`

MarketplaceController_revokeRole

```php
$client->marketplace()->revokeRole(string $roleType, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.roleType` (required): {"type": "string"}

## `createRequest()`

MarketplaceController_createRequest

```php
$client->marketplace()->createRequest(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateRequestDto"
      }
    }
  }
}
```


## `listRequests()`

MarketplaceController_listRequests

```php
$client->marketplace()->listRequests(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.as` (required): {"type": "string"}
- `query.status` (required): {"type": "string"}
- `query.workModel` (required): {"type": "string"}
- `query.budgetModel` (required): {"type": "string"}
- `query.maxBudgetRateCents` (required): {"type": "string"}
- `query.offset` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}

## `getRequest()`

MarketplaceController_getRequest

```php
$client->marketplace()->getRequest(string $requestId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.requestId` (required): {"type": "string"}

## `updateRequest()`

MarketplaceController_updateRequest

```php
$client->marketplace()->updateRequest(string $requestId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.requestId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateRequestDto"
      }
    }
  }
}
```


## `sendRequest()`

MarketplaceController_sendRequest

```php
$client->marketplace()->sendRequest(string $requestId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.requestId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SendRequestDto"
      }
    }
  }
}
```


## `withdrawRequest()`

MarketplaceController_withdrawRequest

```php
$client->marketplace()->withdrawRequest(string $requestId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.requestId` (required): {"type": "string"}

## `pauseRequest()`

MarketplaceController_pauseRequest

```php
$client->marketplace()->pauseRequest(string $requestId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.requestId` (required): {"type": "string"}

## `closeRequest()`

MarketplaceController_closeRequest

```php
$client->marketplace()->closeRequest(string $requestId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.requestId` (required): {"type": "string"}

## `inviteExpertToRequest()`

MarketplaceController_inviteExpertToRequest

```php
$client->marketplace()->inviteExpertToRequest(string $requestId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.requestId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/InviteExpertDto"
      }
    }
  }
}
```


## `createProposal()`

MarketplaceController_createProposal

```php
$client->marketplace()->createProposal(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateProposalDto"
      }
    }
  }
}
```


## `listProposals()`

MarketplaceController_listProposals

```php
$client->marketplace()->listProposals(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.as` (required): {"type": "string"}
- `query.requestId` (required): {"type": "string"}
- `query.status` (required): {"type": "string"}
- `query.offset` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}

## `acceptProposal()`

MarketplaceController_acceptProposal

```php
$client->marketplace()->acceptProposal(string $proposalId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.proposalId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RespondProposalDto"
      }
    }
  }
}
```


## `declineProposal()`

MarketplaceController_declineProposal

```php
$client->marketplace()->declineProposal(string $proposalId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.proposalId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RespondProposalDto"
      }
    }
  }
}
```


## `declineInvitation()`

MarketplaceController_declineInvitation

```php
$client->marketplace()->declineInvitation(string $proposalId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.proposalId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DeclineInvitationDto"
      }
    }
  }
}
```


## `counterProposal()`

MarketplaceController_counterProposal

```php
$client->marketplace()->counterProposal(string $proposalId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.proposalId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CounterProposalDto"
      }
    }
  }
}
```


## `createServiceOffer()`

MarketplaceController_createServiceOffer

```php
$client->marketplace()->createServiceOffer(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateServiceOfferDto"
      }
    }
  }
}
```


## `listMyServiceOffers()`

MarketplaceController_listMyServiceOffers

```php
$client->marketplace()->listMyServiceOffers(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateServiceOffer()`

MarketplaceController_updateServiceOffer

```php
$client->marketplace()->updateServiceOffer(string $offerId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.offerId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateServiceOfferDto"
      }
    }
  }
}
```


## `publishServiceOffer()`

MarketplaceController_publishServiceOffer

```php
$client->marketplace()->publishServiceOffer(string $offerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.offerId` (required): {"type": "string"}

## `pauseServiceOffer()`

MarketplaceController_pauseServiceOffer

```php
$client->marketplace()->pauseServiceOffer(string $offerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.offerId` (required): {"type": "string"}

## `archiveServiceOffer()`

MarketplaceController_archiveServiceOffer

```php
$client->marketplace()->archiveServiceOffer(string $offerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.offerId` (required): {"type": "string"}

## `searchServiceOffers()`

MarketplaceController_searchServiceOffers

```php
$client->marketplace()->searchServiceOffers(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getServiceOffer()`

MarketplaceController_getServiceOffer

```php
$client->marketplace()->getServiceOffer(string $idOrSlug, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.idOrSlug` (required): {"type": "string"}

## `bookServiceOffer()`

MarketplaceController_bookServiceOffer

```php
$client->marketplace()->bookServiceOffer(string $offerId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.offerId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/BookServiceOfferDto"
      }
    }
  }
}
```


## `createBooking()`

MarketplaceController_createBooking

```php
$client->marketplace()->createBooking(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateBookingDto"
      }
    }
  }
}
```


## `listBookings()`

MarketplaceController_listBookings

```php
$client->marketplace()->listBookings(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.organizationId` (optional): {"type": "string"}
- `query.expertAccountId` (optional): {"type": "string"}
- `query.status` (optional): {"type": "string"}
- `query.offset` (optional): {"type": "number"}
- `query.limit` (optional): {"type": "number"}

## `getBooking()`

MarketplaceController_getBooking

```php
$client->marketplace()->getBooking(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `rebookCompletedBooking()`

MarketplaceController_rebookCompletedBooking

```php
$client->marketplace()->rebookCompletedBooking(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RebookMarketplaceDto"
      }
    }
  }
}
```


## `createBookingReview()`

MarketplaceController_createBookingReview

```php
$client->marketplace()->createBookingReview(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateMarketplaceReviewDto"
      }
    }
  }
}
```


## `reportReview()`

MarketplaceController_reportReview

```php
$client->marketplace()->reportReview(string $reviewId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.reviewId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ReportMarketplaceReviewDto"
      }
    }
  }
}
```


## `getWorkSummary()`

MarketplaceController_getWorkSummary

```php
$client->marketplace()->getWorkSummary(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `createTimeEntry()`

MarketplaceController_createTimeEntry

```php
$client->marketplace()->createTimeEntry(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateTimeEntryDto"
      }
    }
  }
}
```


## `submitTimeEntry()`

MarketplaceController_submitTimeEntry

```php
$client->marketplace()->submitTimeEntry(string $bookingId, string $timeEntryId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
- `path.timeEntryId` (required): {"type": "string"}

## `reviewTimeEntry()`

MarketplaceController_reviewTimeEntry

```php
$client->marketplace()->reviewTimeEntry(string $bookingId, string $timeEntryId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
- `path.timeEntryId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ReviewTimeEntryDto"
      }
    }
  }
}
```


## `createMilestone()`

MarketplaceController_createMilestone

```php
$client->marketplace()->createMilestone(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateMilestoneDto"
      }
    }
  }
}
```


## `submitMilestone()`

MarketplaceController_submitMilestone

```php
$client->marketplace()->submitMilestone(string $bookingId, string $milestoneId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
- `path.milestoneId` (required): {"type": "string"}

## `reviewMilestone()`

MarketplaceController_reviewMilestone

```php
$client->marketplace()->reviewMilestone(string $bookingId, string $milestoneId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
- `path.milestoneId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ReviewMilestoneDto"
      }
    }
  }
}
```


## `updateBookingStatus()`

MarketplaceController_updateBookingStatus

```php
$client->marketplace()->updateBookingStatus(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateBookingStatusDto"
      }
    }
  }
}
```


## `createServiceAgreement()`

MarketplaceController_createServiceAgreement

```php
$client->marketplace()->createServiceAgreement(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateServiceAgreementDto"
      }
    }
  }
}
```


## `acceptServiceAgreement()`

MarketplaceController_acceptServiceAgreement

```php
$client->marketplace()->acceptServiceAgreement(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
