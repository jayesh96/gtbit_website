from __future__ import unicode_literals
from django.core.urlresolvers import reverse
from django.db import models

# Create your models here.

class NoticeBoard(models.Model):
	id = models.AutoField(primary_key=True)
	title = models.CharField(max_length=100, blank=True, null=False)
	details = models.TextField(blank=True, null=True)
	date = models.DateField(auto_now=False)
	hide = models.BooleanField(default=True)
	timestamp = models.DateTimeField(auto_now_add=True, auto_now=False)

	class Meta:
		ordering = ["-id"]

	def __unicode__(self):
		return self.title

