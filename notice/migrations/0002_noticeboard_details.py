# -*- coding: utf-8 -*-
# Generated by Django 1.10.6 on 2017-03-10 08:40
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('notice', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='noticeboard',
            name='details',
            field=models.TextField(blank=True, null=True),
        ),
    ]
