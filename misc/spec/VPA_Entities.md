VPA Entities
====

VPA needs two entities:

- Record
  - index to owner
  - category
  - key
  - data

- Owner
  - UUID
  - Password (hash)
  - Permission
  - Salt (the salt that was used to generate the password hash)
