<?php
/*
 * Copyright 2008 - 2015 Milo Liu<cutadra@gmail.com>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *    1. Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *    2. Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are
 * those of the authors and should not be interpreted as representing official
 * policies, either expressed or implied, of the copyright holder.
 */

/**
 * 对应Action结点的配置数据结构.
 *
 * 层次关系如下:
 * ----------
 * application
 * |-- actions
 *     |-- action
 *
 * 下属成员中:
 * - id 和 clzName为结点属性
 * - filters 和 results 为子结点
 *
 * @see AppConfig
 */
class ActionConfig
{
    public $id;

    public $clzName;


    /**
     * 新增action类型, 默认为controller, 可选值还包括'rest'
     * controller 为标准类型
     * rest 用于映射Restful API, 该类型的action需要另外两个新增的设置共同直效, 分别为:
     *  - method
     *  - url
     * @var string
     */
    public $type = 'controller';

    /**
     * 此配置暂仅用于type为rest的action配置, 用于表示对应的HTTP METHOD, 当前仅支持四种,
     * 分别为: get, post, put, 和delete
     * @var string
     */
    public $method = 'get';

    /**
     * 仅当type为rest时起效, 用于定义当前api绑定的Restful API URL
     * @var string
     */
    public $url;

    /**
     * @var array<filterId>
     */
    public $filters;

    /**
     * @var array<ResultConfig>
     */
    public $results;



    public function toXml()
    {
        $outXml = "<action id=\"{$this->id}\" class=\"{$this->clzName}\">";

        foreach ($this->filters as $filter) {
            $outXml .= "<filter id=\"$filter\"/>";
        }

        foreach ($this->results as $result) {
            $outXml .= $result->toXml();
        }

        $outXml .= '</action>';

        return $outXml;
    }
}
