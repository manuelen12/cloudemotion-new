# -*- coding: utf-8 -*-
# Generated by Django 1.10.8 on 2017-12-08 19:19
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('curriculum', '0004_auto_20171201_1325'),
    ]

    operations = [
        migrations.AddField(
            model_name='portfolios',
            name='screenshot',
            field=models.CharField(blank=True, max_length=250, null=True),
        ),
    ]