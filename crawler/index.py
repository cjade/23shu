#!/usr/bin/python
# -*- coding: utf-8 -*-
import os
import re
import requests
from lxml import etree


def get_html(url, name):
    """
    获取小说内容
    :param url: 地址
    :param name: 名称
    :return:
    """
    html = get_resource(url)
    content = html.xpath('//dd[@id="contents"]')
    c = etree.tostring(content[0], encoding='utf-8', method='text').decode('utf-8')
    c = re.sub("(\n+)|(\r\n)+|(<br>)+", '', c)
    write_content_to_file('儒道至圣/'+str(name)+'.txt', c)


def write_content_to_file(file_name, file_data):
    """
    写入内容到文件中
    :param file_name: 文件名
    :param file_data: 文件内容
    :return:
    """
    file = open(file_name, 'a+')
    file.write(file_data)
    file.close()


def mkdir(path):
    """
    新建文件夹
    :param path: 路径
    :return:
    """
    folder = os.path.exists(path)

    if not folder:
        os.makedirs(path)
    else:
        print("目录:" + str(path) + "已存在")


def get_index():
    """
    获取文章所有章节
    :return:
    """
    url = 'https://www.23us.so/files/article/html/2/2521/index.html'
    html = get_resource(url)
    content = html.xpath('//td[@class="L"]')
    mkdir('儒道至圣')
    for key, index in enumerate(content):
        c = etree.tostring(index, encoding='utf-8', method='html').decode('utf-8')
        lists = re.findall(r'<td class="L"><a href="(.+?)">(.+?)</a></td>', c)
        for href, name in lists:
            get_html(href, name)


def get_resource(url):
    """
    获取资源
    :param url:
    :return:
    """
    headers = {
        'Referer': 'https://www.23us.so/',
        'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36'
    }

    r = requests.get(url, headers=headers)
    status_code = r.status_code
    if status_code != 200:
        exit(0)

    r.encoding = 'utf-8'
    html = etree.HTML(r.text)
    return html


get_index()
