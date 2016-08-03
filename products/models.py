from django.db import models

from .validators import ZipCodeValidator

class Product(models.Model):
    title = models.CharField(max_length=120, help_text='제목을 입력해주세요.')
    image = models.ImageField()
    default_category = models.ManyToManyField('Category', help_text='관련된 카테고리를 모두 골라주세요.')
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.title

class Category(models.Model):
    title = models.CharField(max_length=50, help_text='카테고리 제목')

    def __str__(self):
        return self.title

class ZipCode(models.Model):
    city = models.CharField(max_length=20)
    road = models.CharField(max_length=20)
    dong = models.CharField(max_length=20)
    gu = models.CharField(max_length=20)
    code = models.CharField(max_length=7, validators=[ZipCodeValidator(True)])