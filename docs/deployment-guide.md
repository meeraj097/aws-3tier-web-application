# Deployment Guide

## Overview

This guide explains how to deploy the Enterprise 3-Tier Web Application on AWS.

---

# Prerequisites

- AWS Account
- EC2 Key Pair
- IAM User with required permissions
- Git installed
- Basic Linux knowledge

---

# Step 1: Create a VPC

- Create a custom VPC.
- Configure an IPv4 CIDR block.
- Enable DNS Resolution.
- Enable DNS Hostnames.

---

# Step 2: Create Subnets

Create four subnets:

## Public Subnets

- Public-Subnet-1
- Public-Subnet-2

Used for:

- Application Load Balancer
- Public routing

## Private Subnets

- Private-DB-Subnet-1
- Private-DB-Subnet-2

Used for:

- Amazon RDS MySQL

---

# Step 3: Create an Internet Gateway

- Create an Internet Gateway.
- Attach it to the VPC.

---

# Step 4: Configure Route Tables

Create a public route table.

Add the following route:

Destination

```
0.0.0.0/0
```

Target

```
Internet Gateway
```

Associate the route table with both public subnets.

---

# Step 5: Create Security Groups

## ALB Security Group

Inbound:

- HTTP (80) from 0.0.0.0/0

---

## EC2 Security Group

Inbound:

- HTTP from ALB Security Group
- SSH from administrator IP

---

## RDS Security Group

Inbound:

- MySQL (3306) from EC2 Security Group

---

# Step 6: Launch EC2

Launch an Amazon Linux 2023 instance.

Configure:

- Security Group
- Key Pair
- Public Subnet

---

# Step 7: Install Software

Install:

- Nginx
- PHP
- PHP MySQL Extension

Start:

- nginx
- php-fpm

Deploy the PHP application.

---

# Step 8: Create Amazon RDS

Create a MySQL database.

Configure:

- Private Subnet Group
- Database Security Group

Create:

- employee_db
- employees table

Insert sample employee records.

---

# Step 9: Configure the Application

Update the PHP application with:

- Database Endpoint
- Username
- Password

Verify database connectivity.

---

# Step 10: Create an Application Load Balancer

Create:

- Internet-facing ALB

Configure:

- Listener on HTTP (80)
- Target Group

Register EC2 instances.

---

# Step 11: Create a Launch Template

Configure:

- Amazon Linux 2023 AMI
- Instance Type
- Security Group
- User Data Script

---

# Step 12: Create an Auto Scaling Group

Configure:

- Launch Template
- Desired Capacity
- Minimum Capacity
- Maximum Capacity

Attach the Target Group.

---

# Step 13: Test the Application

Open the Application Load Balancer DNS name.

Expected Result:

- Employee records displayed successfully.

---

# Troubleshooting

## EC2 cannot connect to RDS

Check:

- Security Groups
- Database Endpoint
- Database Status

---

## Target Group unhealthy

Verify:

- Nginx running
- Health Check path
- Security Groups

---

## ALB not accessible

Verify:

- Public Subnets
- Internet Gateway
- Route Table
- Listener Configuration

---

# Result

Successfully deployed a scalable 3-tier web application using:

- Amazon VPC
- EC2
- Nginx
- PHP
- Amazon RDS
- Application Load Balancer
- Launch Template
- Auto Scaling Group
- GitHub
