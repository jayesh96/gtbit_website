from __future__ import unicode_literals
from django.core.urlresolvers import reverse
from django.db import models
from django.core.files.base import ContentFile


# Create your models here.

class Events(models.Model):
	id = models.AutoField(primary_key=True)
	title = models.CharField(max_length=100, blank=True, null=False)
	image = models.ImageField(upload_to = 'events_folder/',default=False)
	details = models.TextField(blank=True, null=True)
	date = models.DateField(auto_now=False)
	hide = models.BooleanField(default=True)
	timestamp = models.DateTimeField(auto_now_add=True, auto_now=False)

	class Meta:
		ordering = ["-id"]

	def __unicode__(self):
		return self.title

