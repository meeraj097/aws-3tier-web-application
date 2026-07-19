# AWS Architecture

## Overview

This project implements a highly available 3-tier web application architecture on Amazon Web Services (AWS).

The architecture separates the presentation layer, application layer, and database layer to improve scalability, availability, and security.

---

## High-Level Architecture

```
                    Internet
                        │
                        ▼
         Application Load Balancer (ALB)
                        │
        ┌───────────────┴───────────────┐
        │                               │
        ▼                               ▼
   EC2 Instance                    EC2 Instance
 (Nginx + PHP)                  (Nginx + PHP)
        │                               │
        └───────────────┬───────────────┘
                        │
                        ▼
             Amazon RDS MySQL
             (Private Subnets)
```

---

## Components

### Amazon VPC

- Custom VPC
- Isolated network environment
- CIDR block configured for the project

### Public Subnets

- Host the Application Load Balancer
- Internet accessible through the Internet Gateway

### Private Database Subnets

- Host the Amazon RDS MySQL instance
- No direct internet access

### Internet Gateway

Provides internet connectivity for public resources.

### Route Tables

Configured to route internet-bound traffic from public subnets through the Internet Gateway.

### Security Groups

- ALB accepts HTTP traffic from the internet.
- EC2 accepts HTTP traffic only from the ALB.
- RDS accepts MySQL traffic only from the EC2 Security Group.

### Application Load Balancer

Distributes incoming traffic across multiple EC2 instances.

### Auto Scaling Group

Automatically maintains the desired number of EC2 instances and supports scaling based on demand.

### Amazon EC2

Runs the Nginx web server, PHP application, and communicates with the RDS database.

### Amazon RDS MySQL

Stores employee information in a managed MySQL database deployed in private subnets.

---

## Benefits

- High Availability
- Improved Security
- Scalability
- Fault Tolerance
- Separation of Application and Database Layers
